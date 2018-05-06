<?php

namespace Moet\Modules\Frontend\Controllers;

use IOFactory;
use Moet\Library\Paginate;
use Moet\Models\MoetTopics;
use Moet\Modules\Frontend\Models\TopicForm;
use PHPExcel;

class TopicController extends ControllerBase
{
    public function beforeExecuteRoute($dispatcher)
    {
        $sessID = $this->session->getId();
        $user = $this->session->get("session_users_$sessID");
        if(0 === (int)$user->status){
            return $this->response->redirect('/');
        }
    }

    public function indexAction()
    {
        $currentPage = $this->request->has('page') ? $this->request->get('page', 'int') : 1;
        $topics = !is_null($this->_user->MoetTopics)?$this->_user->MoetTopics:new \stdClass();
        $paginator = new Paginate(
            [
                'data'  => $topics,
                'limit' => 10,
                'page'  => $currentPage,
            ]
        );

        $this->view->setVars([
            'topics' => $paginator->getPaginate()
        ]);
    }

    public function formAction()
    {
        if($this->request->isPost()){
            if($this->security->checkToken()){
                $moetTopics = new MoetTopics();
                $dataPost = $this->request->getPost();
                
                $this->parseStudentInfo($dataPost, $student_info);

                $moetTopics->name = $dataPost['topicName'];
                $moetTopics->code = $dataPost['topicCode'];
                $moetTopics->units_id = $dataPost['units_id'];
                $moetTopics->fields_id = $dataPost['fields_id'];
                $moetTopics->specialize_id = $dataPost['specialize_id'];
                $moetTopics->instructor = $dataPost['instructor'];
                $moetTopics->science_topic = $dataPost['scienceTopic'];
                $moetTopics->unit_manager = $dataPost['unitManager'];
                $moetTopics->expected_council = $dataPost['expectedCouncil'];
                $moetTopics->council_point = is_numeric($dataPost['councilPoint']) ? round($dataPost['councilPoint'],2) : 0;
                $moetTopics->expected_award = $dataPost['expectedAward'];
                $moetTopics->noted = $dataPost['noted'];
                $moetTopics->student_info = $student_info;
                $moetTopics->creator_id = $this->_user->id;

                if(!$moetTopics->save()){
                    $messages = $moetTopics->getMessages();
                    foreach ($messages as $message) {
                        echo $message, "<br>";
                    }
                }else{
                    return $this->response->redirect('topic');
                }
            }
        }
    	$this->view->setVars([
    		'form' => new TopicForm()
    	]);
    }

    public function exportAction()
    {
        $this->view->disable();
        // add condition here
        $condition = ['creator_id'=>$this->_user->id];
        $data = MoetTopics::find($condition);
        
        $phpExcelObject = new PHPExcel();
        $phpExcelObject->getProperties()->setCreator("Nguyen Ba Thanh")
            ->setLastModifiedBy("Nguyen Ba Thanh")
            ->setTitle("Danh sach de tai")
            ->setSubject("Danh sach de tai khoa hoc")
            ->setDescription("Danh sach de tai khoa hoc cac truong dai hoc trong ca nuoc")
            ->setKeywords("De tai khoa hoc")
            ->setCategory("Bo giao duc va dao tao");

        $phpExcelObject->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Số TT')
            ->setCellValue('B1', 'Lĩnh vực KH&CN của giải thưởng')
            ->setCellValue('C1', 'Chuyên ngành')
            ->setCellValue('D1', 'Mã đề tài')
            ->setCellValue('E1', 'Tên đề tài')
            ->setCellValue('F1', 'Tên đơn vị')
            ->setCellValue('G1', 'Sinh viên thực hiện')
            ->setCellValue('H1', 'Giới tính')
            ->setCellValue('I1', 'Dân tộc')
            ->setCellValue('J1', 'Năm học')
            ->setCellValue('K1', 'Ngành học của sinh viên')
            ->setCellValue('L1', 'Địa chỉ liên hệ của SV chịu trách nhiệm chính')
            ->setCellValue('M1', 'Người hướng dẫn chính')
            ->setCellValue('N1', 'Công bố của SV về đề tài')
            ->setCellValue('O1', 'Cán bộ phụ trách SV NCKH của đơn vị')
            ->setCellValue('P1', 'Dự kiến hội đồng vòng sơ khảo')
            ->setCellValue('Q1', 'Điểm đánh giá của hội đồng sơ khảo')
            ->setCellValue('R1', 'Dự kiến xếp giải')
            ->setCellValue('S1', 'Ghi chú');

        foreach ($data as $key => $topic) {
            $student = json_decode($topic->student_info);
            $phpExcelObject->setActiveSheetIndex(0)
                ->setCellValue('A'.($key+2), $key+1)
                ->setCellValue('B'.($key+2), $topic->MoetFields->name)
                ->setCellValue('C'.($key+2), $topic->MoetUnitsSpecialize->name)
                ->setCellValue('D'.($key+2), $topic->code)
                ->setCellValue('E'.($key+2), $topic->name)
                ->setCellValue('F'.($key+2), $topic->MoetUnits->name)
                ->setCellValue('G'.($key+2), $student->student)
                ->setCellValue('H'.($key+2), $student->sex==='male' ? 'Nam' : 'Nữ')
                ->setCellValue('I'.($key+2), $student->genus)
                ->setCellValue('J'.($key+2), $student->scholastic)
                ->setCellValue('K'.($key+2), $student->specialize)
                ->setCellValue('L'.($key+2), $student->contact)
                ->setCellValue('M'.($key+2), $topic->instructor)
                ->setCellValue('N'.($key+2), $topic->science_topic)
                ->setCellValue('O'.($key+2), $topic->unit_manager)
                ->setCellValue('P'.($key+2), $topic->expected_council)
                ->setCellValue('Q'.($key+2), $topic->council_point)
                ->setCellValue('R'.($key+2), $topic->expected_award)
                ->setCellValue('S'.($key+2), $topic->noted);
        }

        $phpExcelObject->getActiveSheet()->setTitle('Danh sach de tai KH&CN');

        $phpExcelObject->getActiveSheet()->freezePaneByColumnAndRow(7,2);
        $phpExcelObject->getActiveSheet()->getStyle('A1:X1')->getFont()->setBold(true);
        $phpExcelObject->getActiveSheet()->getPageSetup()->setFitToWidth(1);
        $phpExcelObject->getActiveSheet()->setAutoFilter('A1:S1');

        $savePath = $this->config->application->downloadDir;
        $fileName = "Danh_sach_de_tai_".date('YmdHis');

        $objWriter = IOFactory::createWriter($phpExcelObject);
        IOFactory::save($objWriter, $savePath, $fileName);
        
        return $this->response->redirect("http://moet.local.com/files/$fileName.xlsx");
    }

    private function parseStudentInfo($dataPost=[], &$student_info=null){
        $info = [
            'student' => $dataPost['student'],
            'sex' => $dataPost['studentSex'],
            'genus' => $dataPost['studentGenus'],
            'scholastic' => $dataPost['studentScholastic'],
            'specialize' => $dataPost['studentSpecialize'],
            'contact' => $dataPost['studentDeputyAddress']
        ];
        $student_info = json_encode($info);
    }

}

