@echo off
title ArabSkills Local Server
cd /d "%~dp0"
set PATH=D:\ArabSkills\php;%PATH%
echo ===================================================
echo   ArabSkills Local Development Server
echo ===================================================
echo   Starting server at http://127.0.0.1:8000
echo   Press Ctrl+C to stop the server
echo ===================================================
echo.
php artisan serve --host=127.0.0.1 --port=8000
pause
