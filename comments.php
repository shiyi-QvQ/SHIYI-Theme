<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<style>
:root { --c-warm: #fdebdf; --c-warm-dark: #f5dcc8; }
#comments { margin-top: 2rem; }
.comment-list, .comment-list ol { list-style: none; padding: 0; margin: 0; }
.comment-item { background: #fff; border-radius: 1.5rem; padding: 1.5rem; margin-bottom: 1.5rem; box-shadow: 0 4px 12px rgba(0,0,0,0.03); }
.dark .comment-item { background: #1e2124; border: 1px solid #334155; }
.comment-author { font-weight: 700; color: #8b7355; font-size: 0.9rem; }
.comment-date { font-size: 0.75rem; color: #999; margin-left: 0.5rem; }
.comment-content { margin-top: 0.75rem; color: #555; line-height: 1.7; font-size: 0.9rem; }
.comment-reply { margin-top: 1rem; padding-top: 1rem; border-top: 1px solid rgba(0,0,0,0.05); text-align: right; font-size: 0.8rem; }
.children { padding-left: 2rem; }
.children .comment-item { background: var(--c-warm); border-radius: 1rem; margin-top: 1rem; }
#comment-form { margin-top: 2rem; padding: 2rem; background: #fff; border-radius: 2rem; }
.dark #comment-form { background: #1a1c1e; }
.form-group { margin-bottom: 1rem; }
.form-group input, .form-group textarea { width: 100%; padding: 0.875rem 1.25rem; border-radius: 1rem; border: 1px solid #e5e7eb; background: #f9fafb; font-size: 0.9rem; outline: none; }
.dark .form-group input, .dark .form-group textarea { background: #0f172a; border-color: #334155; color: #e2e8f0; }
.btn-submit { background: var(--c-warm); color: #8b7355; border: none; padding: 0.875rem 2.5rem; border-radius: 1rem; font-weight: 700; cursor: pointer; }
.respond-icon { font-size: 1.25rem; font-weight: 700; color: #8b7355; margin-bottom: 1.5rem; display: block; }
</style>

<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
    <span class="respond-icon">发表评论</span>
    <?php $comments->listComments(); ?>
    <div class="flex justify-center my-4"><?php $comments->pageNav('&laquo;', '&raquo;'); ?></div>
    <?php endif; ?>

    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
            <?php $comments->cancelReply(); ?>
        </div>
        <div id="comment-form">
            <span class="respond-icon">回复</span>
            <form method="post" action="<?php $this->commentUrl(); ?>" id="comment-form" role="form">
                <?php if($this->user->hasLogin()): ?>
                <p class="mb-4 text-sm"><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出 &raquo;'); ?></a></p>
                <?php else: ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group"><input type="text" name="author" placeholder="Name *" value="<?php $this->remember('author'); ?>" required></div>
                    <div class="form-group"><input type="email" name="mail" placeholder="Email *" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail): ?>required<?php endif; ?>></div>
                </div>
                <?php endif; ?>
                <div class="form-group"><textarea name="text" rows="5" placeholder="Say something..." required><?php $this->remember('text'); ?></textarea></div>
                <button type="submit" class="btn-submit">继续→</button>
            </form>
        </div>
    </div>
    <?php endif; ?>
</div>
