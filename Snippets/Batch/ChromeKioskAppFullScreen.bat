@echo off
setlocal

:: Set the URL you want to open
set URL=https://yourapp.site

start "" "C:\Program Files\Google\Chrome\Application\chrome.exe" --app="%URL%"--autoplay-policy=no-user-gesture-required --window-position=1366,0 --kiosk --user-data-dir=c:/monitor2

endlocal
