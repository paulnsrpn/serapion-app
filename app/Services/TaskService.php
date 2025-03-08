<?php
namespace App\Services;

    class TaskService{
        protected $tasks=[];

        public function add($name){
            $this->task=$name;
        }

        public function getAllTasks(){
            return $this->tasks;
        }
    }