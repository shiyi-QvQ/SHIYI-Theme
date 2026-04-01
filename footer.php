<script>
// 打字机效果初始化
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.typewriter').forEach(function(el) {
        var text = el.getAttribute('data-text');
        if (!text) return;
        try {
            var arr = JSON.parse(text);
        } catch(e) { var arr = [text]; }
        var speed = parseInt(el.getAttribute('data-speed')) || 100;
        var delSpeed = parseInt(el.getAttribute('data-delete-speed')) || 50;
        var pause = parseInt(el.getAttribute('data-pause-time')) || 2000;
        var mode = el.getAttribute('data-typing-mode') || 'loop';
        var i = 0, j = 0, deleting = false;
        function type() {
            if (!deleting) {
                el.textContent = arr[i].substring(0, j+1);
                j++;
                if (j >= arr[i].length) { deleting = true; setTimeout(type, pause); return; }
                setTimeout(type, speed);
            } else {
                el.textContent = arr[i].substring(0, j-1);
                j--;
                if (j <= 0) { deleting = false; i = (i+1)%arr.length; setTimeout(type, 500); return; }
                setTimeout(type, delSpeed);
            }
        }
        type();
    });
});
</script>

<footer class="mt-12 py-8 text-center text-sm text-neutral-400 border-t border-neutral-200 dark:border-neutral-700">
    <div class="max-w-[var(--page-width)] mx-auto px-4">
        <p class="mb-2"><?php echo isset($this->options->copyrightText) && $this->options->copyrightText ? htmlspecialchars($this->options->copyrightText) : '备案号：'; ?></p>
        <p class="text-xs">本程序由 <strong>SHIYI主题</strong> 强力驱动 | 作者：<a href="javascript:void(0)" class="hover:text-[var(--primary)]">十一</a></p>
    </div>
</footer>

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
</body>
</html>
