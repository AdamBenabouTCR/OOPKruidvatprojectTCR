<?php

    class User
    {
        protected $password;

        public function __construct($usermail = NULL, $password = NULL, $username = NULL, $usernummer = NULL)
        {
            $this->usermail=$usermail;
            $this->password=$password;
            $this->username=$username;
            $this->usernummer=$usernummer;
        }

        public function set_usermail($usermail)
        {
            $this->usermail=$usermail;
        }

        public function set_password($password)
        {
            $this->password=$password;
        }

        public function set_username($username)
        {
            $this->username=$username;
        }

        public function set_usernummer($usernummer)
        {
            $this->usernummer=$usernummer;
        }

        public function createUser()
        {
        }

        public function updateUser()
        {
        }

        public function login()
        {
        }

        public function get_usermail()
        {
            return $this->usermail;
        }

        public function get_password()
        {
            return $this->password;
        }

        public function get_username()
        {
            return $this->username;
        }

        public function get_usernummer()
        {
            return $this->usernummer;
        }
    }
?>
