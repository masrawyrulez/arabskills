@echo off
title ArabSkills Cloudflare Public Tunnel
cd /d "%~dp0"
echo ===================================================
echo   Starting ArabSkills Cloudflare Public Tunnel
echo ===================================================
echo   Ensure your local server is running (start-server.bat)
echo   Generating your secure Cloudflare HTTPS link...
echo ===================================================
echo.
cloudflared tunnel --url http://127.0.0.1:8000
pause
