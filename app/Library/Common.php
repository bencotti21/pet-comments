<?php

namespace App\Library;

use App\Models\Comment;

class Common
{
  public static function getDiffTime (Comment $comment) {
    return $comment->created_at->diffForHumans();
  }

  public static function getUpdatedWord (Comment $comment) {
    if ($comment->updated_at > $comment->created_at) {
      return "（編集済み）";
    }
  }

  public static function getTargetUser ($target_id) {
    if (Comment::find($target_id)) {
      return Comment::find($target_id)->user;
    }
    return false;
  }
}