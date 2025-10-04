// 获取网站内容
async function loadContent() {
    try {
        const response = await fetch('php/get_content.php');
        const data = await response.json();
        
        if (data.success) {
            document.getElementById('contentDisplay').textContent = data.content;
        }
    } catch (error) {
        console.error('加载内容失败:', error);
    }
}

// 更新内容
async function updateContent() {
    const password = document.getElementById('adminPassword').value;
    const newContent = document.getElementById('contentInput').value.trim();
    
    if (!password) {
        alert('请输入管理密码！');
        return;
    }
    
    if (!newContent) {
        alert('请输入要更新的内容！');
        return;
    }
    
    try {
        const formData = new FormData();
        formData.append('password', password);
        formData.append('content', newContent);
        
        const response = await fetch('php/update_content.php', {
            method: 'POST',
            body: formData
        });
        
        const data = await response.json();
        
        if (data.success) {
            alert('内容更新成功！');
            document.getElementById('contentInput').value = '';
            document.getElementById('adminPassword').value = '';
            loadContent(); // 重新加载内容
        } else {
            alert('更新失败: ' + data.message);
        }
    } catch (error) {
        console.error('更新失败:', error);
        alert('更新失败，请检查网络连接');
    }
}

window.onload = loadContent;