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
        return  $this->countAllResults();
    }

    public function insert($data)
	{
		$this->insert($data);
		$insert_id = $this->insertID();
		return $insert_id;
	}

	public function update($id, $data)
	{
		$this->set($data);
		$this->where('id', $id);
		$this->update();
	}
	
	public function delete($id)
	{
		$this->set('is_deleted', true);
		$this->where('id', $id);
		return $this->update();
	}

	public function restore($id)
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