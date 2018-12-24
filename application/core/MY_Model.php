<?php
/**
 * A base model with a series of CRUD functions (powered by CI's query builder),
 * validation-in-model support, event callbacks and more.
 *
 * @link http://github.com/jamierumbelow/codeigniter-base-model
 * @copyright Copyright (c) 2012, Jamie Rumbelow <http://jamierumbelow.net>
 */

class MY_Model extends CI_Model
{

    protected $table;
    protected $primary_key = 'id';
    protected $order_by = null;
    public $limit = LIMIT;

    public function __construct()
    {
        parent::__construct();
        $this->order_by = array($this->primary_key,'desc');
        $this->load->database();
    }

    /**
    *
    * Return type query
    * @param object     Return $this->db->result as result
    * @param string      Get type result
    * @return null   
    *
    **/
    public function show($result , $input = null){
        $result1    = null;
        if ($input) {
            switch ($input) {
                case 'result_array':
                    $result1 = $result->result_array();
                    break;
                case 'row_array':
                    $result1 = $result->row_array();
                    break;
                case 'num_rows':
                    $result1 = $result->num_rows();
                    break;
                case 'list_fields':
                    $result1 = $result->list_fields();
                    break;
                case 'row':
                    $result1 = $result->row();
                    break;
                case 'result':
                    $result1 = $result->result();
                    break;
                
                default:
                    $result1 = $result->row_array();
                    break;
            }
        }
        
        return $result1?$result1:$result->row_array();;
    }

    public function getInfo($primary_value = null){
        if (!$primary_value) {
            return false;
        }
        return $this->getWhere(array($this->primary_key => $primary_value));
    }

    public function getWhere($params,$params2 = null){
        $result     = $this->db->from($this->table);
        $result     = $this->db->where($params)->get();
        if (!empty($params2)) {
            return $this->show($result , $params2);
        }
        return $result->row_array();        
    }

    /**
    *
    * Ham tra ve nhieu record bang where
    * @param string     ---
    * @return bool|null    ---
    *
    **/
    public function getByWhere($params, $limit = null, $not_result = null){
        if (isset($params['select'])) {
            $this->db->select($params['select']);
        }
        $this->db->from($this->table)->where($params);    
        if (isset($limit['limit']) and $limit) {
            $this->db->limit($limit['limit'][0],$limit['limit'][1]);
        }
        if ($not_result) {
            return $this->show($this->db->get() , $not_result);
        }
        return $this->db->get()->result_array();
    }

    public function getLike($params, $params2 = null){
        $this->db->from($this->table);
        $result = $this->db->like($params)->get();
        if (!empty($params2)) {
            return $this->show($result , $params2);
        }
        return $this->db->row_array();
    }

    public function getByLike($params, $limit = null, $not_result = null){
        if (isset($params['select'])) {
            $this->db->select($params['select']);
        }
        $this->db->from($this->table)->like($params['like']);    
        if (isset($limit) and $limit) {
            $this->db->limit($limit['limit'][0],$limit['limit'][1]);
        }
        if ($not_result) {
            return $this->show($this->db->get() , $not_result);    
        }
        return $this->db->get()->result_array();
    }

    /**
    *
    * Hàm trả về query theo điều kiện
    * @param array     Tham so query
    * @param array     Tham so query
    * @return bool|null    ---
    *
    **/
    public function getBy($params = null,$params2 = null){

        /** Selected **/
        if (isset($params['select']) and $params['select']) {
            $this->db->select($params['select']);
        }

        /** Settable **/
        $this->db->from($this->table.'s');

        /** Set where **/
        if (isset($params['where']) and $params['where']) {
            $this->db->where($params['where']);
        }

        /*
        $like = array(
            array('a', 'b', 'before'),
            array('c', 'd', 'after'),
        );
        $like = array(
            'name' => 'a',  
            'age'  => 'b',  
        );
        */
        if (isset($params['like']) and $params['like']) { 
            if (isset($params['like'][0]) and $params['like'][0]) {
                foreach ($params['like'] as $key => $value) {
                    isset($value[2])?$this->db->like($value[0], $value[1], $values[2]):$this->db->like($value[0], $value[1]);
                }
            }
            else{
                $this->db->like($params['like']);
            }
        }

        /** Set limited - lay x gia tri bat dau tu y gia tri**/
        /*
        $limit = array(
            1, 2
        );
        $limit = 1;
        */
        if (isset($params['limit']) and $params['limit']) {
            if (isset($params['limit'][1]) and $params['limit'][1]) {
                $this->db->limit($params['limit'][0], $params['limit'][1]);
            }
            else{
                $this->db->limit( $this->limit, $params['limit']);
            }
        }

        /** Set orderby **/
        /*
        $orderby = array(
            array('price', 'desc'),
            array('id', 'asc'),
        );
        $oderby = array(
            'price', 'desc'
        );
        */
        if (isset($params['order_by']) and $params['order_by']) {
            if (is_array($params['order_by'][0])) {
                foreach ($params['order_by'] as $key => $value) {
                    $this->db->order_by($value['order_by'][0],$value['order_by'][1]);
                }
            }
            else{
                $this->db->order_by($params['order_by'][0],$params['order_by'][1]);
            }
        }
        else{
            if ($params2 != 'num_rows') {
                //mặc định sẽ sắp xếp theo id giảm dần 
                $order_by = empty($this->order_by) ? array($this->primary_key, 'desc') : $this->order_by;
                $this->db->order_by($order_by[0], $order_by[1]);
            }
        }

        /** Get **/
        $result    = $this->db->get();

        /** Result **/
        if (!empty($params2)) {
            return $this->show($result , $params2);
        }
        return $result->result_array();
    }

    public function getCountBy($params = null){
        return $this->getBy($params, 'num_rows');
    }

    /**
     * Fetch an array of records based on an array of primary values.
     */
    public function getManyWhere($whereIn, $params = null)
    {
        if (isset($params['select'])) {
            $this->db->select($params['select']);
        }
        $this->db->from($this->table)->where_in($this->primary_key,$whereIn);    
        if (isset($params['limit'])) {
            $this->db->limit($params['limit'][0],$params['limit'][1]);
        }
        if (isset($params['result'])) {
            return $this->show($this->db->get(),$params);
        }
        return $this->db->get()->result_array();
    }

    /**
     * Fetch an array of records based on an arbitrary WHERE call.
     */
    /*public function get_many_where($params,$params2 = null)
    {
        $result = $this->db->from($this->table);
        if (!empty($params2)) {
            $result = $this->db->where_in($params,$params2);
        }
        else{
            foreach ($params as $key => $value) {
                $result = $this->db->where_in($key,$value);
            }
        }    
        return $result;    
    }*/

    /**
     * Fetch all the records in the table. Can be used as a generic call
     * to $this->_database->get() with scoped methods.
     */
    public function getAll($params = null)
    {
        if (!empty($params)) {
            $this->db->select($params);
        }
        if (isset($params['order_by'])) {
            return $this->db->from($this->table)->order_by($params['order_by'][0],$params['order_by'][1])->get()->result_array();
        }
        return $this->db->from($this->table)->order_by($this->order_by[0],$this->order_by[1])->get()->result_array();
    }

    /**
     * Insert a new row into the table. $data should be an associative array
     * of data to be inserted. Returns newly created ID.
     */
    public function insert($data, $skip_validation = FALSE)
    {
        foreach ($data as $key => $value) {
            $arr_input[strtolower($key)]  = $value;
        }
        $this->db->insert($this->table,$arr_input);
        return $insert_id = $this->db->insert_id(); // tra ve id hien tai gui len
    }

    /**
     * Insert multiple rows into the table. Returns an array of multiple IDs.
     */
    public function insertMany($data)
    {
        $arr = null;
        foreach ($data as $key => $value) {
            foreach ($value as $key_strto => $value_strto) {
                $arr_input[strtolower($key_strto)]  = $value_strto;
            }
            $arr[] = $this->db->insert($this->table,$arr_input);
        }
        return $arr;
    }

    /**
     * Updated a record based on the primary value.
     */
    public function update($data,$primary_value)
    {
        return $this->db->set($data)
                            ->where($this->primary_key, $primary_value)
                            ->update($this->table);
    }

    public function updateWhere( $data, $where)
    {
        return $result = $this->db->set($data)
                                    ->where($where)
                                    ->update($this->table);
    }

    /**
     * Update many records, based on an array of primary values.
     */
    public function updateManyByPrimarykey( $data, $primary_values)
    {
        return $result = $this->db->set($data)
                                    ->where_in($this->primary_key,$primary_value)
                                    ->update($this->table);
    }

    /**
     * Update all records
     */
    public function updateAll($data)
    {
        return $result = $this->db->set($data)->update($this->table);
                                    
    }

    /**
     * Delete a row from the table by the primary value
     * Kiem tra an du lieu hay xoa
     */
    public function delete($primary_values, $destroy = null)
    {
        if (!empty($destroy)) {
            return $this->update($primary_values,array('status'=>'trash'));
        }
        return $this->db->where($this->primary_key,$primary_values)->delete($this->table);
        
    }

    /**
     * Delete a row from the database table by an arbitrary WHERE clause
     */
    public function deleteWhere($where, $destroy = null)
    {
        if (!empty($destroy)) {
            return $this->update_where($where,array('status'=>'trash'));
        }
        return $this->db->where($where)->delete($this->table);
    }

    /**
     * Delete many rows from the database table by multiple primary values
     */
    public function deleteManyWhere($primary_values, $destroy = null)
    {
        if (!empty($destroy)) {
            return $this->updateManyWhere(array('status'=>'trash'),$primary_values);
        }
        return $this->db->where_in($this->primary_key, $primary_values)->delete($this->table);
    }

    /**
     * Delete many rows from the database table by multiple primary values
     */
    public function deleteAll($destroy = null)
    {
        if (!empty($destroy)) {
            return $this->updateAll(array('status'=>'trash'));
        }
        return $this->db->delete($this->table);
    }

    /**
     * Fetch a count of rows based on an arbitrary WHERE call.
     */
    public function countWhere($where)
    {
        // lay du lieu bang co dieu kien where
        return $this->db->select($this->primary_key)->where($where)->get($this->table)->num_rows();
    }

    /**
     * Fetch a total count of rows, disregarding any previous conditions
     * lay tong so hang bo qua bat cu dieu kien where nao truoc
     */
    public function countAll()
    {
        return $this->db->select($this->primary_key)->get($this->table)->num_rows();
    }

    /**
     * Return the next auto increment of the table. Only tested on MySQL.
     * Tim hieu lay ban ghi tiep theo trong database
     */
    public function getNextId()
    {
        return (int) $this->db->select('AUTO_INCREMENT')
            ->from('information_schema.TABLES')
            ->where('TABLE_NAME', $this->table)
            ->where('TABLE_SCHEMA', $this->db->database)
            ->get()->row()->AUTO_INCREMENT;
    }

    /**
     * Getter for the table name
     * Tra ve bang hien tai
     */
    public function table()
    {
        return $this->table;
    }

    /* --------------------------------------------------------------
     * GLOBAL SCOPES
     * ------------------------------------------------------------ *

    /* --------------------------------------------------------------
     * OBSERVERS
     * ------------------------------------------------------------ */

    /* --------------------------------------------------------------
     * QUERY BUILDER DIRECT ACCESS METHODS
     * ------------------------------------------------------------ */

    /**
     * A wrapper to $this->_database->order_by()
     */
    /*public function order_by($criteria, $order = 'ASC')
    {
        if ( is_array($criteria) )
        {
            foreach ($criteria as $key => $value)
            {
                $this->_database->order_by($key, $value);
            }
        }
        else
        {
            $this->_database->order_by($criteria, $order);
        }
        return $this;
    }*/

    /**
     * A wrapper to $this->_database->limit()
     */
    /*public function limit($limit, $offset = 0)
    {
        $this->_database->limit($limit, $offset);
        return $this;
    }*/

    /* --------------------------------------------------------------
     * INTERNAL METHODS
     * ------------------------------------------------------------ */

    /**
     * Run validation on the passed data
     */
    public function validate($data)
    {
        if($this->skip_validation)
        {
            return $data;
        }

        if(!empty($this->validate))
        {
            foreach($data as $key => $val)
            {
                $_POST[$key] = $val;
            }

            $this->load->library('form_validation');

            if(is_array($this->validate))
            {
                $this->form_validation->set_rules($this->validate);

                if ($this->form_validation->run() === TRUE)
                {
                    return $data;
                }
                else
                {
                    return FALSE;
                }
            }
            else
            {
                if ($this->form_validation->run($this->validate) === TRUE)
                {
                    return $data;
                }
                else
                {
                    return FALSE;
                }
            }
        }
        else
        {
            return $data;
        }
    }

    /**
     * Guess the primary key for current table
     * Hien thi khoa chinh cua bang
     */
    private function _fetch_primary_key()
    {
        if($this->primary_key == NULl)
        {
            $this->primary_key = $this->db->query("SHOW KEYS FROM ".$this->table." WHERE Key_name = 'PRIMARY'")->row()->Column_name;
        }
    }

    /**
     * Set WHERE parameters, cleverly
     */
    protected function setWhere($params,$params2 = null)
    {
        if (!empty($params2)) {
            $this->where($param,$params2);
        }
        else{
            if (is_array($param)) {
                $this->where($param);
            }
        }
    }

    /**
     * Set Like parameters, cleverly
     */
    protected function setLike($params,$params2 = null)
    {
        if (!empty($params2)) {
            $this->like($param,$params2);
        }
        else{
            if (is_array($param)) {
                $this->like($param);
            }
        }
    }

    /**
     * Return the method name for the current return type
     */
    protected function _return_type($multi = FALSE)
    {
        $method = ($multi) ? 'result' : 'row';
        return $this->_temporary_return_type == 'array' ? $method . '_array' : $method;
    }
}
