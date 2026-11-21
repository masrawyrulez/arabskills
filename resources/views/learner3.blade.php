<!DOCTYPE html>
<html lang="en">
<head>
  <title>ArabSkills Certificates</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;700&display=swap" rel="stylesheet">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="{{asset('arabskills website/Profile pic copy .png')}}" type="image/x-icon">

  <style>
    body{
 font-family: "Cairo", Arial, sans-serif; 
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
      top: 29%;
      right:  2%;
      font-size: clamp(3px, 4.5vw, 35px);
      font-weight: 500;
      padding: 0 0%;
     color:  rgb(109, 157, 235);
    }

    .program{

      top: 42%;
      font-size: clamp(12px, 2.6vw, 35px);
      padding: 0 0%;
    }

    .client-value{
      bottom: 43.6%;
      left: 23.5%;
      width: 30%;
      text-align: left;
      font-size: clamp(3px, 1.8vw, 18px);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .track-value{
      bottom: 47%;
      left: 18.5%;
      width: 30%;
      text-align: left;
      font-size: clamp(3px, 1.8vw, 18px);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .place-value{
      bottom: 47.5%;
      left: 45.5%;
      width: 30%;
      text-align: left;
      font-size: clamp(3px, 1.8vw, 18px);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .Training-value{
      bottom: 43.5%;
      left: 51%;
      width: 30%;
      text-align: left;
      font-size: clamp(3px, 1.8vw, 18px);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .Duration-value{
      bottom: 43.5%;
      left: 81.5%;
      width: 30%;
      text-align: left;
      font-size: clamp(3px, 1.8vw, 18px);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .Duration-value2{
      bottom: 47%;
      left: 80%;
      width: 30%;
      text-align: left;
      font-size: clamp(3px, 1.8vw, 18px);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .date-value{
      bottom:33.2%;
      left: 18%;
      width: 25%;
      text-align: left;
      font-size: clamp(10px, 1.8vw, 15px);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .date-value2{
      bottom:33.2%;
      left: 86%;
      width: 25%;
      text-align: left;
      font-size: clamp(10px, 1.8vw, 15px);
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
    @media (max-width: 420px){

.date-value,.Training-value,.place-value,.track-value,    .client-value,
.date-value2,.Duration-value2,.Duration-value{
  font-size: clamp(5px, 1vw, 1px);
  width: 32%;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

  /* keep them aligned but slightly adjusted for phones */
  .date-value{
    left: 17.5%;
    bottom: 33%;
  }

  .date-value2{
    left: 86%;
    bottom: 33%;
  }
  .name{
         top: 27%;

  }
}


    
    
  </style>
</head>

<body>

  <div id="certificate" class="cert-wrap">
    <img src="{{ asset('certificates/om.jpeg') }}" alt="certificate">

    <canvas id="qrCanvas" class="qr"></canvas>

    <div class="layer name">{{ $learner->Learner_Name }}</div>
    <div class="layer program">{{ $learner->Course_Name }}</div>
    <div class="layer client-value">{{ $learner->Track }}</div>
    <div class="layer track-value">{{ $learner->التخصص }}</div>
    <div class="layer place-value">{{ $learner->التدريب}}</div>
    <div class="layer Training-value">{{ $learner->Training_Area}}</div>
    <div class="layer Duration-value">{{ $learner->	Training_Duration}}</div>
    <div class="layer Duration-value2">{{ $learner->	Training_Duration}}</div>
    <div class="layer date-value2">{{ $learner->	Learner_Code}}</div>
    <div class="layer date-value">{{ \Carbon\Carbon::parse($learner->Date)->format('d.m.Y') }}
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
      link.download = 'certificate_{{ $learner->Learner_Name }}.png';
      link.href = canvas.toDataURL('image/png');
      link.click();
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/qrious@4.0.2/dist/qrious.min.js"></script>
  <script>
    const qrValue = @json(url('/wfpc01/' . $learner->Learner_Code));

    new QRious({
      element: document.getElementById('qrCanvas'),
      value: qrValue,
      size: 140
    });
  </script>

</body>
</html>
