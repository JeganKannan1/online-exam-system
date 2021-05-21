<?php

namespace App\Services;

class UserService {

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    public function getUserDetails($value){
        return $this->userRepository->getUser($value);
    }

}