<?php
class PostsController extends AppController{
	public $helpers = array("Html","Form","Session");
    public $components = array('Session');

    public function index(){
        $a = $this->Post->find("all");
        $this->set("posts",$a);
//        $this->flash("请跳转",array("action"=>"add"));
//        pr($a);
//        $a = $this->request->here;
//        pr($a);
//        pr($this->request->domain());
//        pr($this->request->header('User-Agent'));
//        pr($this->request->accepts("application/xml"));
//        $this->response->header('Location', 'http://baidu.com');
//        pr($this->request->subdomains());
    }

    public function view($id = null){
        if(!$id){
            throw new NotFoundException(__('Invalid post'));
        }
        $post = $this->Post->findById($id);
        if(!$post){
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set("post",$post);
    }

    public function add(){
        if($this->request->is("post")){
            $this->Post->create();
            if($this->Post->save($this->request->data)){
                $this->Session->setFlash("your post has been saved.");
                $this->redirect(array("action"=>"index"));
            }else{
                $this->Session->setFlash("unable to add your post.");
            }
        }
    }

    public function edit($id = null){
        if(!$id){
            throw new NotFoundException(__('Invalid post'));
        }
        $post = $this->Post->findById($id);
        if(!$post){
            throw new NotFoundException(__('Invalid post'));
        }
        if($this->request->is("post")||$this->request->is("put")){
            $this->Post->id = $id;
            if($this->Post->save($this->request->data)){
                $this->Session->setFlash('Your post has been updated.');
                $this->redirect(array("action"=>"index"));
            }else{
                $this->Session->setFlash('\'Unable to update your post.');
            }
        }
        if(!$this->request->data){
            $this->request->data = $post;
        }
    }

    public function delete($id = null){
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if(!$id){
            throw new NotFoundException(__('Invalid post'));
        }
        if($this->Post->delete($id)){
            $this->Session->setFlash('The post with id: ' . $id . ' has been deleted.');
            $this->redirect(array("action"=>"index"));
        }
    }

}
