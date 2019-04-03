<?php
namespace App\Controllers;

use \Jiny\Core\Controllers\Controller;
use \Jiny\Core\Registry\Registry;

class Board1Controller extends Controller
{

    private $db;
    private $board;

    public function __construct($app=NULL)
    {
        $this->setApp($app);

        // DB를 초기화 합니다.
        // echo __DIR__."/../../conf/"."dbconf.php";
        $this->db = \Jiny\Database\db_init(__DIR__."\..\..\conf\\"."dbconf.php");

        $this->board = new \Jiny\Board\Board();
    }

    // 기본실행 메서드
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            return $this->list();
        } else {

        }
    }


    public function list()
    {
        $this->board->setBoard("board5");
        return $this->board->list();
    }

    public function new()
    {

        if (empty($_POST)) {
            //echo "배열이 비어 있습니다.";
            //print_r($_POST);
            return view('board_new');

        } else {
            // 데이터를 저장합니다.

            $table = "board5";

            $titleText = "셈플입력입니다.";
            $data = [
                'regdate' => date("Y-m-d H:i:s"),
                'title' => htmlspecialchars(strip_tags($_POST['title']))
            ];
            
            $this->db->table($table)->insert($data);

            if ($rows = $this->db->table($table)->select(['regdate','title'])) {
                // print_r($rows);
                header('Location: /board');
            }

        }

        
    }

    public function __invoke()
    {

        $id = conf("req")['uridata'][1];
        $id = intval($id);

        if ($id) {

            if (isset($_POST['_method']) && $_POST['_method'] == "DELETE") {
                // return "글 삭제";
                $table = "board5";
                
                $this->db->table($table)->delete($id);

                header('Location: /board');
                return;
            } else if(isset($_POST['_method']) && $_POST['_method'] == "UPDATE") {
                // return "글 수정";

                
            } else {
                $table = "board5";
                if ($row = $this->db->table($table)->select(['id','regdate','title'], ['id'=>$id])) {
                    return view("board_view", $row[0]);
                }
            }

            
        }
        return "글보기 오류";
        
    }

    public function edit()
    {
        if($_POST['_method'] == "PUT") {
            // return "수정완료";

            $id = $_POST['_id'];

            $table = "board5";
            if ($row = $this->db->table($table)->select(['id','regdate','title'], ['id'=>$id])) {
                unset($_POST['_id']);
                unset($_POST['_method']);

                foreach($_POST as $key => $value) {
                }

                $this->db->table($table)->update($_POST,$id);
                
                header('Location: /board/'.$id);
                return;
            }



            

                

        } else {
            $table = "board5";
            $id = $_POST['_id'];
            if ($row = $this->db->table($table)->select(['id','regdate','title'], ['id'=>$id])) {
                return view("board_edit", $row[0]);
            }
        }

        
     
    }


}