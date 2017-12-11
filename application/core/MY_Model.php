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
    protected $limit = 20;

    public function __construct()
    {
        parent::__construct();
        $this->order_by = array($this->primary_key,'desc');
        $this->load->database();
    }

    public function show($result , $input = null){
        if (isset($input['result'])) {
            switch ($input['result']) {
                case 'result_array':
                    $result = $result->result_array();
                    break;
                case 'row_array':
                    $result = $result->row_array();
                    break;
                case 'num_rows':
                    $result = $result->num_rows();
                    break;
                case 'list_fields':
                    $result = $result->list_fields();
                    break;
                case 'row':
                    $result = $result->row();
                    break;
                case 'result':
                    $result = $result->result();
                    break;
                
                default:
                    $result = $result->row_array();
                    break;
            }
        }
        return $result;
    }

    public function getInfo($primary_value = null){
        if (empty($primary_value)) {
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

    public function getByWhere($params,$not_result = null){
        if (isset($params['select'])) {
            $this->db->select($params['select']);
        }
        $this->db->from($this->table)->where($params);    
        if (isset($params['limit'])) {
            $this->db->limit($params['limit'][0],$params['limit'][1]);
        }
        if ($not_result) {
            return $this->db;    
        }
        return $this->db->get()->result_array();
    }

    public function getLike($params,$params2 = null){
        $result = $this->db->from($this->table);
        $this->db->like($params)->get();
        if (!empty($params2)) {
            return $this->show($params2);
        }
        return $this->db->row_array();
    }

    public function getByLike($params,$not_result = null){
        if (isset($params['select'])) {
            $this->db->select($params['select']);
        }
        $this->db->from($this->table)->where($params);    
        if (isset($params['limit'])) {
            $this->db->limit($params['limit'][0],$params['limit'][1]);
        }
        if ($not_result) {
            return $this->db;    
        }
        return $this->db->get()->result_array();
    }

    public function getBy($params = null,$params2 = null){
        if (isset($params['select'])) {
            $this->db->select($params['select']);
        }
        $this->db->from($this->table);
        if (isset($params['where'])) {
            $this->db->where($params['where']);
        }
        if (isset($params['like'])) { 
            if (is_array($params['like'][0])) { // neu phan tu thu nhat la mang
                $this->db->like($params['like']);
            }
            else{   // phan tu thu nhat la chuoi
                if (isset($params[2])) {    // ton tai phan tu thu 3
                    $this->db->like($params[0],$params[1]);
                }
                else{
                    $this->db->like($params[0],$params[1],$params[2]);
                }
            }
        }
        if (isset($params['order_by'])) {
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
            //mặc định sẽ sắp xếp theo id giảm dần 
            $order_by = empty($this->order_by) ? array($this->primary_key, 'desc') : $this->order_by;
            $this->db->order_by($order_by[0], $order_by[1]);
        }
        if (isset($params['limit'])) {
            $this->db->limit($params['limit'][0], $params['limit'][1]);
        }
        else{
            $this->db->limit($this->limit);
        }
        $result    = $this->db->get();
        if (!empty($params2)) {
            return $this->show($result , $params2);
        }
        return $result->result_array();
    }

    /**
     * Fetch an array of records based on an array of primary values.
     */
    public function getMany($values)
    {
        return $this->db->from($this->table)->where_in($this->primary_key,$values)->get()->result_array();
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
    public function updateManyWhere( $data, $primary_values)
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
