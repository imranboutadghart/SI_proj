<?php
class product
{
	public $id = null;
	public $src = null;
	public $description = null;
	public $price = null;
	function __construct($n_id, $n_src, $n_description, $n_price) {
		$this->id = $n_id;
		$this->src = $n_src;
		$this->description = $n_description;
		$this->price = $n_price;
	}
	function get_product() {
		return $this;
	}
}
class employee
{
	public $emp_id = null;
	public $emp_name = null;
	function __construct($n_id, $n_name) {
		$this->emp_id = $n_id;
		$this->emp_name = $n_name;
	}
	function get_employee() {
		return $this;
	}
}
class receipt
{
	public $receipt_id = null;
	public $receipt_date = null;
	public $emp_id = null;
	function __construct($n_id, $n_date, $n_emp) {
		$this->receipt_id = $n_id;
		$this->receipt_date = $n_date;
		$this->emp_id = $n_emp;
	}
	function get_receipt() {
		return $this;
	}
}
class purchase_row{
	public $pr_id = null;
	public $amount = null;
	public $product_id = null;
	function __construct($n_id, $n_amount, $n_pid)
	{
		$this->pr_id = $n_id;
		$this->amount = $n_amount;
		$this->product_id = $n_pid;
	}
	function get_pr() {
		return $this;
	}
}
?>