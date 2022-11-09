<?php
interface IMessage {
    public function jsonSerialize();
    public function getMessage() : string;
    public function getPostDate() : date;
}