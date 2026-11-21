@echo off
title Push ArabSkills to GitHub
cd /d "%~dp0"
set PATH=C:\Users\Masrawy\AppData\Local\GitHubDesktop\app-3.6.7\resources\app\git\cmd;%PATH%
echo ===================================================
echo   Pushing ArabSkills to GitHub:
echo   https://github.com/masrawyrulez/arabskills
echo ===================================================
echo.
git push -u origin main
echo.
echo ===================================================
echo   Done! Press any key to exit.
echo ===================================================
pause
