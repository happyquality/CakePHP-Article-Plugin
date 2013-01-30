<?php
App::uses('ArticleAppController', 'Article.Controller');
/**
 * Articles Controller
 *
 * @property Article $Article
 */
class ArticlesController extends ArticleAppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Article->recursive = 0;
		$this->set('articles', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException('表示対象が見つかりません');
		}
		$this->set('article', $this->Article->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Article->create();
			if ($this->Article->save($this->request->data)) {
				$this->Session->setFlash('Articleを登録しました', 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('入力内容に誤りがあります<br />入力内容をご確認ください', 'warning');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException('更新対象が見つかりません');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Article->save($this->request->data)) {
				$this->Session->setFlash('更新しました', 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('入力内容に誤りがあります<br />入力内容をご確認ください', 'warning');
			}
		} else {
			$this->request->data = $this->Article->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException('削除対象が見つかりません');
		}
		if ($this->Article->delete()) {
			$this->Session->setFlash('ID:'.$id.'を削除しました', 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash('ID:'.$id.'の削除に失敗しました', 'error');
			$this->redirect(array('action' => 'index'));
		}
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Article->recursive = 0;
		$this->set('articles', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException('表示対象が見つかりません');
		}
		$this->set('article', $this->Article->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Article->create();
			if ($this->Article->save($this->request->data)) {
				$this->Session->setFlash('Articleを登録しました', 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('入力内容に誤りがあります<br />入力内容をご確認ください', 'warning');
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException('更新対象が見つかりません');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Article->save($this->request->data)) {
				$this->Session->setFlash('更新しました', 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('入力内容に誤りがあります<br />入力内容をご確認ください', 'warning');
			}
		} else {
			$this->request->data = $this->Article->read(null, $id);
		}
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Article->id = $id;
		if (!$this->Article->exists()) {
			throw new NotFoundException('削除対象が見つかりません');
		}
		if ($this->Article->delete()) {
			$this->Session->setFlash('ID:'.$id.'を削除しました', 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash('ID:'.$id.'の削除に失敗しました', 'error');
			$this->redirect(array('action' => 'index'));
		}
	}
}
