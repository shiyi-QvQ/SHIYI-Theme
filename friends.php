<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<?php
// 读取插件配置
$pageTitle = !empty($this->options->plugin('Friends')->pageTitle) 
    ? $this->options->plugin('Friends')->pageTitle 
    : '友链';
$pageDesc = !empty($this->options->plugin('Friends')->pageDesc) 
    ? $this->options->plugin('Friends')->pageDesc 
    : '与志同道合的朋友们交换链接，一起成长。欢迎申请友链！';
?>

<style>
.friends-page { margin-top: 6rem; padding: 0 1rem 4rem; max-width: var(--page-width); margin-left: auto; margin-right: auto; }
.friends-header { text-align: center; margin-bottom: 3rem; }
.friends-header h1 { font-size: 2.5rem; font-weight: 700; color: var(--text-color); margin-bottom: 1rem; }
.friends-header p { color: var(--text-muted); max-width: 600px; margin: 0 auto; }
.friends-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.5rem; margin-bottom: 3rem; }
.friend-card { background: var(--card-bg); border-radius: 1rem; padding: 1.5rem; transition: all 0.3s; border: 1px solid var(--border-color); display: flex; align-items: center; gap: 1rem; text-decoration: none; }
.friend-card:hover { transform: translateY(-4px); box-shadow: 0 8px 24px rgba(var(--primary-rgb), 0.15); border-color: var(--primary); }
.friend-avatar { width: 64px; height: 64px; border-radius: 1rem; object-fit: cover; flex-shrink: 0; }
.friend-info { flex: 1; min-width: 0; }
.friend-name { font-weight: 700; color: var(--text-color); margin-bottom: 0.25rem; }
.friend-desc { font-size: 0.875rem; color: var(--text-muted); display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
.apply-section { background: var(--card-bg); border-radius: 1.5rem; padding: 2rem; border: 1px solid var(--border-color); margin-top: 2rem; }
.apply-section h2 { font-size: 1.5rem; font-weight: 700; margin-bottom: 1.5rem; color: var(--text-color); }
.form-group { margin-bottom: 1rem; }
.form-label { display: block; font-weight: 600; font-size: 0.875rem; color: var(--text-color); margin-bottom: 0.5rem; }
.form-input { width: 100%; padding: 0.75rem 1rem; border-radius: 0.75rem; border: 1px solid var(--border-color); background: var(--page-bg); color: var(--text-color); font-size: 1rem; transition: border-color 0.2s; box-sizing: border-box; }
.form-input:focus { outline: none; border-color: var(--primary); }
.form-textarea { min-height: 100px; resize: vertical; }
.form-select { width: 100%; padding: 0.75rem 1rem; border-radius: 0.75rem; border: 1px solid var(--border-color); background: var(--page-bg); color: var(--text-color); font-size: 1rem; box-sizing: border-box; }
.form-submit { width: 100%; padding: 0.875rem; background: var(--primary); color: white; border: none; border-radius: 0.75rem; font-weight: 600; cursor: pointer; transition: all 0.2s; margin-top: 1rem; }
.form-submit:hover { opacity: 0.9; transform: translateY(-2px); }
.form-submit:disabled { background: #ccc; cursor: not-allowed; transform: none; }
.form-message { padding: 1rem; border-radius: 0.75rem; margin-bottom: 1rem; display: none; }
.form-message.success { background: #d1fae5; color: #065f46; display: block; }
.form-message.error { background: #fee2e2; color: #991b1b; display: block; }
@media (max-width: 768px) {
    .friends-page { margin-top: 5rem; padding: 0 0.75rem 4rem; }
    .friends-header h1 { font-size: 1.75rem; }
    .friends-grid { grid-template-columns: 1fr; }
    .friend-card { padding: 1rem; }
    .friend-avatar { width: 48px; height: 48px; }
    .apply-section { padding: 1.5rem; }
}
</style>

<div class="friends-page">
    <div class="friends-header">
        <h1><?php echo htmlspecialchars($pageTitle); ?></h1>
        <p><?php echo htmlspecialchars($pageDesc); ?></p>
    </div>
    
    <div class="friends-grid" id="friends-list">
        <div class="text-center text-neutral-400 py-8">加载中...</div>
    </div>
    
    <div class="apply-section">
        <h2>申请友链</h2>
        <div class="form-message" id="form-message"></div>
        <form id="friend-form">
            <div class="form-group">
                <label class="form-label">网站名称 *</label>
                <input type="text" name="name" class="form-input" placeholder="请输入网站名称" required>
            </div>
            <div class="form-group">
                <label class="form-label">网站地址 *</label>
                <input type="url" name="url" class="form-input" placeholder="https://example.com" required>
            </div>
            <div class="form-group">
                <label class="form-label">网站Logo</label>
                <input type="url" name="logo" class="form-input" placeholder="https://example.com/logo.png">
            </div>
            <div class="form-group">
                <label class="form-label">网站简介 *</label>
                <textarea name="description" class="form-input form-textarea" placeholder="简单介绍一下您的网站" required></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">分类</label>
                <select name="category" class="form-select">
                    <option value="tech">技术博客</option>
                    <option value="life">生活记录</option>
                    <option value="design">设计创意</option>
                    <option value="other">其他</option>
                </select>
            </div>
            <button type="submit" class="form-submit" id="submit-btn">提交申请</button>
        </form>
    </div>
</div>

<script>
(function() {
    function loadFriends() {
        var list = document.getElementById('friends-list');
        fetch('<?php $this->options->siteUrl(); ?>index.php/friends/api?do=list')
            .then(function(res) { return res.json(); })
            .then(function(data) {
                if (data.code === 200 && data.data && data.data.length > 0) {
                    var html = '';
                    data.data.forEach(function(f) {
                        var logo = f.logo || '<?php $this->options->themeUrl('assets/home/default-logo.png'); ?>';
                        html += '<a href="' + f.url + '" class="friend-card" target="_blank">';
                        html += '<img src="' + logo + '" alt="' + f.name + '" class="friend-avatar">';
                        html += '<div class="friend-info">';
                        html += '<div class="friend-name">' + f.name + '</div>';
                        if (f.description) {
                            html += '<div class="friend-desc">' + f.description + '</div>';
                        }
                        html += '</div></a>';
                    });
                    list.innerHTML = html;
                } else {
                    list.innerHTML = '<div class="text-center text-neutral-400 py-8">暂无友链</div>';
                }
            })
            .catch(function() {
                list.innerHTML = '<div class="text-center text-neutral-400 py-8">加载失败</div>';
            });
    }
    
    document.getElementById('friend-form').addEventListener('submit', function(e) {
        e.preventDefault();
        var btn = document.getElementById('submit-btn');
        var msg = document.getElementById('form-message');
        var fd = new FormData(this);
        
        btn.disabled = true;
        btn.textContent = '提交中...';
        
        var p = new URLSearchParams();
        p.append('name', fd.get('name'));
        p.append('url', fd.get('url'));
        p.append('logo', fd.get('logo'));
        p.append('description', fd.get('description'));
        p.append('category', fd.get('category'));
        
        fetch('<?php $this->options->siteUrl(); ?>index.php/friends/api?do=apply', {
            method: 'POST',
            body: p
        })
        .then(function(r) { return r.json(); })
        .then(function(d) {
            if (d.code === 200) {
                msg.className = 'form-message success';
                msg.textContent = d.msg;
                document.getElementById('friend-form').reset();
            } else {
                msg.className = 'form-message error';
                msg.textContent = d.msg;
            }
        })
        .catch(function() {
            msg.className = 'form-message error';
            msg.textContent = '提交失败，请稍后重试';
        })
        .finally(function() {
            btn.disabled = false;
            btn.textContent = '提交申请';
        });
    });
    
    loadFriends();
})();
</script>

<?php $this->need('footer.php'); ?>
