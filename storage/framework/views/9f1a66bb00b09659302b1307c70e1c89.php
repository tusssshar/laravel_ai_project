<!DOCTYPE html>
<html>
<head>
    <title>AI Code Explainer</title>
    <style>
        textarea { width:100%; height:150px; font-family: monospace; }
        pre { background:#f4f4f4; padding:10px; white-space: pre-wrap; word-wrap: break-word; }
        button { padding:10px 20px; font-size:16px; }
    </style>
</head>
<body>

<h2>AI-Powered PHP Code Explainer</h2>

<form method="POST" action="/explain">
    <?php echo csrf_field(); ?>
    <textarea name="code" placeholder="Paste code here..."></textarea><br><br>
    <button type="submit">Explain Code</button>
</form>

<hr>

<?php if(!empty($explaination)): ?>
    <pre><?php echo e($code); ?></pre>
    <p><strong>Explanation:</strong> <?php echo e($explaination); ?></p>
<?php endif; ?>

</body>
</html>
<?php /**PATH D:\xampp\htdocs\laravel\entrata_project\entrata_ai_project\resources\views//explainer.blade.php ENDPATH**/ ?>