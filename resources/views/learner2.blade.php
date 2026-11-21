<!DOCTYPE html>
<html lang="en">
<head>
  <title>ArabSkills Certificates</title>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="{{asset('arabskills website/Profile pic copy .png')}}" type="image/x-icon">

  <style>
    body{
      font-family: Arial, sans-serif;
      background:#f5f5f5;
      margin: 0;
      padding: 0;
    }

    /* ===== Responsive wrapper ===== */
    .cert-wrap{
      position: relative;
      width: min(1200px, 95vw);
      aspect-ratio: 1200 / 850;  /* keeps the certificate shape */
      margin: 18px auto;
      background: #fff;
      overflow: hidden;
    }

    .cert-wrap img{
      width: 100%;
      height: 100%;
      position: absolute;
      inset: 0;
      z-index: 0;
      object-fit: cover;
    }

    .layer{
      position: absolute;
      z-index: 1;
      width: 100%;
      text-align: center;
      color: #000;
      line-height: 1.2;
    }

    /* ===== Use percentages instead of px (responsive positions) ===== */
    .name{
      top: 41.2%;
      font-size: clamp(18px, 4.5vw, 54px);
      font-weight: 500;
      padding: 0 3%;
    }

    .program{
      top: 57.1%;
      font-size: clamp(12px, 2.6vw, 30px);
      padding: 0 0%;
    }

    .client-value{
      bottom: 14.5%;
      left: 21.7%;
      width: 30%;
      text-align: left;
      font-size: clamp(10px, 1.8vw, 20px);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .date-value{
      bottom: 14.5%;
      left: 82%;
      width: 25%;
      text-align: left;
      font-size: clamp(10px, 1.8vw, 20px);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .qr{
      position: absolute;
      z-index: 2;
      bottom: 17.6%;
      left: 50%;
      transform: translateX(-50%);
      width: min(12vw, 140px);
      height: min(12vw, 140px);
    }

    .download-btn{
      display:block;
      margin: 14px auto 22px;
      padding: 12px 22px;
      background: rgb(133, 65, 90);
      color:#fff;
      border:none;
      cursor:pointer;
      font-size: 16px;
      border-radius: 5px;
      font-weight: 500;
    }

    /* Extra small screens tweaks */
    @media (max-width: 420px){
      .download-btn{ width: 92vw; }
      .client-value, .date-value{
        width: 32%;
      }
    }
  </style>
</head>

<body>

  <div id="certificate" class="cert-wrap">

    <canvas id="qrCanvas" class="qr"></canvas>

    <div class="layer name">{{ $learner->learner_name }}</div>
    <div class="layer program">{{ $learner->program_name }}</div>

    <div class="layer client-value">{{ $learner->client_name }}</div>
    <div class="layer date-value">{{ \Carbon\Carbon::parse($learner->awarded_date)->format('d.m.Y') }}
</div>
  </div>

  <button class="download-btn" id="download">Download</button>

  <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
  <script>
    document.getElementById('download').addEventListener('click', async () => {
      await new Promise(r => setTimeout(r, 150)); // let QR draw
      const el = document.getElementById('certificate');
      const canvas = await html2canvas(el, { scale: 2, useCORS: true });
      const link = document.createElement('a');
      link.download = 'certificate_{{ $learner->learner_name }}.png';
      link.href = canvas.toDataURL('image/png');
      link.click();
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/dist/qrious.min.js"></script>
  <script>
    const qrValue = @json(url('/ec/' . $learner->learner_code));

    new QRious({
      element: document.getElementById('qrCanvas'),
      value: qrValue,
      size: 140
    });
  </script>

</body>
</html>
