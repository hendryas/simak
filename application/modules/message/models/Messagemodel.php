<?php
class Messagemodel extends CI_model
{
	public function ownerDetails()
	{
		if (isset($_SESSION['id'])) {
			$this->db->select('*');
			$this->db->where('id_user', $_SESSION['id']);
			$res = $this->db->get('user')->result_array();
			return $res;
		}
	}
	public function allUser()
	{
		if (isset($_SESSION['id'])) {
			$mysession = $_SESSION['id'];
			$this->db->select('*');
			$this->db->where('id_user != ', $mysession);
			$data = $this->db->get('user');
			if ($data->num_rows() > 0) {
				return $data->result_array();
			} else {
				return false;
			}
		}
	}
	public function logoutUser($status, $date)
	{
		if (isset($_SESSION['id'])) {
			$currentSession = $_SESSION['id'];
			$this->db->query("UPDATE user SET user_status = '$status' , last_logout = '$date' WHERE 
			id_user = '$currentSession'");
		}
	}
	public function sentMessage($data)
	{
		$this->db->insert('user_messages', $data);
	}
	public function getmessage($data)
	{
		$this->db->select('*');
		$session_id = $_SESSION['id'];
		$where = "sender_message_id = '$session_id' AND receiver_message_id = '$data' OR 
		sender_message_id = '$data' AND receiver_message_id = '$session_id'";
		$this->db->where($where);
		// $this->db->order_by('time', 'ASC');
		$result = $this->db->get('user_messages')->result_array();
		return $result;
	}
	public function getLastMessage($data)
	{
		$this->db->select('*');
		$session_id = $_SESSION['id'];
		$where = "sender_message_id = '$session_id' AND receiver_message_id = '$data' OR 
		sender_message_id = '$data' AND receiver_message_id = '$session_id'";
		$this->db->where($where);
		$this->db->order_by('time', 'DESC');
		$result = $this->db->get('user_messages', 1)->result_array();
		return $result;
	}
	public function getIndividual($id)
	{
		$this->db->select('*');
		$this->db->where('id_user', $id);
		$res = $this->db->get('user')->result_array();
		return $res;
	}
	public function updateBio($data)
	{
		if (isset($_SESSION['id'])) {
			$session_id = $_SESSION['id'];
			$bio = $data['bio'];
			$dob = $data['dob'];
			$address = $data['address'];
			$phone = $data['phone'];

			$this->db->query("UPDATE user SET bio = '$bio', dob = '$dob', address = '$address', phone = '$phone' WHERE id_user = '$session_id'");
			// return $data;
		}
	}
	public function blockUser($arr)
	{
		$this->db->insert('block_user', $arr);
	}
	public function unBlockUser($val1, $val2)
	{
		$this->db->query("DELETE FROM block_user WHERE blocked_from = '$val1' AND blocked_to = '$val2'");
	}
	public function getBlockUserData($val1, $val2)
	{
		$this->db->select('*');
		$where = "blocked_from = '$val1' AND blocked_to = '$val2' OR blocked_from = '$val2' AND blocked_to = '$val1'";
		$this->db->where($where);
		$res = $this->db->get('block_user')->result_array();

		return $res;
	}
}
