<?php echo op_within_page_link() ?>
[<?php printf('%03d', $comment->getNumber()) ?>]<?php echo op_format_date($comment->getCreatedAt(), 'MM/dd HH:mm') ?>
<?php if ($comment->isDeletable($sf_user->getMemberId())): ?>
&nbsp;[<?php echo link_to(__('Delete'), '@communityTopic_comment_delete_confirm?id='.$comment->getId()) ?>]
<?php endif; ?><br>
<?php if ($comment->getMember() && $comment->getMember()->getName()): ?>
<?php echo link_to($comment->getMember()->getName(), 'member/profile?id='.$comment->getMemberId()) ?><br>
<?php endif; ?>
<?php echo nl2br($comment->getBody()) ?>
<?php foreach ($comment->getCommunityTopicCommentImagesJoinFile() as $image): ?>
<br>
<?php echo link_to(__('Image %number%', array('%number%' => $image->number)), sf_image_path($image->File, array('size' => '240x320', 'f' => 'jpg'))) ?><br>
<?php endforeach; ?>
