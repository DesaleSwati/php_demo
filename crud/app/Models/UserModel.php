<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table = 'users';

	protected $primaryKey = 'id';

	protected $allowedFields = ['fname', 'lname', 'email', 'mobile_no', 'is_deleted', 'createdAt', 'updatedAt'];

    public function getUsers(){
		$this->select('*');
		$query = $this->get();
		$query_data = $query->getResultArray();
		return $query_data;
	}

    public function getUsersCount(){
        return $this->countAllResults();
    }

    public function insertData($data = null)
	{
		$this->insert($data);
		$insert_id = $this->insertID();
		return $insert_id;
	}

	public function updateData($id = null, $data = null)
	{
		$this->set($data);
		$this->where('id', $id);
		return $this->update();
	}
	
	public function deleteUser($id)
	{
		$this->set('is_deleted', true);
		$this->where('id', $id);
		return $this->update();
	}

	public function restoreUser($id)
	{
		$this->set('is_deleted', false);
		$this->where('id', $id);
		return $this->update();
	}

    public function userDetailsOnId($id)
	{
		$this->select('
			users.id,
			users.fname,
			users.lname,
			users.email,
			users.mobile_no,
			users.is_deleted,
			users.createdAt,
			users.updatedAt
		');
		$this->where('users.id', $id);
		$query = $this->get();
		$query_data = $query->getRow();
		
		return $query_data;
	}

}

?>