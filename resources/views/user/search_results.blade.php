<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả tìm kiếm</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f5f6fa;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: auto;
        }

        .art-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.08);
            padding: 16px;
            text-align: center;
            transition: transform 0.2s ease;
        }

        .art-card:hover {
            transform: translateY(-5px);
        }

        .art-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }

        .art-card h4 {
            margin-top: 12px;
            margin-bottom: 6px;
            font-size: 1.1rem;
            color: #444;
        }

        .art-card p {
            margin: 0;
            color: #777;
        }

        .no-results {
            text-align: center;
            color: #888;
            font-size: 1.2rem;
            margin-top: 40px;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 30px;
        }

        .back-link a {
            text-decoration: none;
            color: #3490dc;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2>Kết quả tìm kiếm cho: "{{ $query }}"</h2>

    @if($results->count())
        <div class="gallery">
            @foreach($results as $item)
            <div class="art-card">
                <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}">
                <h4>{{ $item['title'] }}</h4>
                <p><strong>Trường phái:</strong> {{ $item['style'] }}</p>

                @if(isset($item['content']) && isset($item['sections']))
                    <button onclick='showDetails(@json($item))' style="margin-top: 10px; padding: 6px 12px; background: #3490dc; color: white; border: none; border-radius: 5px; cursor: pointer;">
                        Đọc thêm
                    </button>
                @endif
            </div>
            @endforeach
        </div>
    @else
        <div class="no-results">Không tìm thấy kết quả phù hợp.</div>
    @endif

    <div class="back-link">
        <a href="{{ url()->previous() }}">← Quay lại trang trước</a>
    </div>

</body>
<!-- Modal hiển thị nội dung chi tiết -->
<div id="modal" style="display:none; position:fixed; top:0; left:0; right:0; bottom:0; background:rgba(0,0,0,0.5); z-index:1000; align-items:center; justify-content:center;">
    <div style="background:white; max-width:800px; width:90%; padding:30px; border-radius:10px; overflow-y:auto; max-height:90vh;">
        <h3 id="modalTitle" style="margin-bottom: 10px;"></h3>
        <p id="modalIntro" style="font-style: italic; margin-bottom: 20px; color: #555;"></p>
        <div id="modalSections"></div>
        <div style="text-align:right; margin-top:20px;">
            <button onclick="closeModal()" style="padding:8px 16px; background:#e3342f; color:white; border:none; border-radius:5px;">Đóng</button>
        </div>
    </div>
</div>

<script>
    function showDetails(data) {
        document.getElementById('modalTitle').innerText = data.title;
        document.getElementById('modalIntro').innerText = data.content;

        let html = '';
        if (data.sections && Array.isArray(data.sections)) {
            data.sections.forEach(section => {
                html += `<h4 style="margin-top: 15px; color: #333;">${section.title}</h4>`;
                html += `<p style="color: #444;">${section.body}</p>`;
            });
        }
        document.getElementById('modalSections').innerHTML = html;

        document.getElementById('modal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('modal').style.display = 'none';
    }
</script>

</html>
