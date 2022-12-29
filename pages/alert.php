<div class="alert">
    <div class="alert-box">
        <div class="alert-close">
            <button class="alert-close-box" onclick="document.querySelector('.alert').classList.add('hidden');">
                <img src="../assets/icons/x.svg" class="alert-icon">
            </button>
        </div>
        <div class="alert-content">
            <?php
                if($alert_type == "success"):
            ?>
                <div class="alert-icon-box"><img src="../assets/icons/check.svg" class="alert-icon"></div>
            <?php else: ?>
                <div class="alert-icon-box"><img src="../assets/icons/x.svg" class="alert-icon"></div>
            <?php endif; ?>
            <div class="alert-box-text"><?=$alert?></div>
            <div class="alert-spacing"></div>
        </div>
    </div>
</div>