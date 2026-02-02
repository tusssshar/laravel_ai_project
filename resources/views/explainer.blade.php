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
    @csrf
    <textarea name="code" placeholder="Paste code here..."></textarea><br><br>
    <button type="submit">Explain Code</button>
</form>

<hr>

@if(!empty($explaination))
    <pre>{{ $code }}</pre>
    <p><strong>Explanation:</strong> {{ $explaination }}</p>
@endif

</body>
</html>
