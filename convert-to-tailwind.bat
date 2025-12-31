@echo off
echo Converting all Bootstrap views to Tailwind CSS...

REM Convert common Bootstrap classes to Tailwind
powershell -Command "(Get-Content 'resources\views\users\create.blade.php') -replace 'class=\"\"card\"\"', 'class=\"\"bg-white rounded-lg shadow\"\"' -replace 'class=\"\"card-header\"\"', 'class=\"\"bg-gray-50 px-6 py-4 border-b-2 border-masjid-green rounded-t-lg\"\"' -replace 'class=\"\"card-body\"\"', 'class=\"\"p-6\"\"' -replace 'class=\"\"btn btn-success\"\"', 'class=\"\"bg-masjid-green hover:bg-masjid-green-dark text-white px-4 py-2 rounded\"\"' -replace 'class=\"\"btn btn-secondary\"\"', 'class=\"\"bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded\"\"' -replace 'class=\"\"form-control\"\"', 'class=\"\"w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-masjid-green\"\"' -replace 'class=\"\"form-label\"\"', 'class=\"\"block text-sm font-medium text-gray-700 mb-2\"\"' -replace 'class=\"\"mb-3\"\"', 'class=\"\"mb-4\"\"' -replace 'class=\"\"row\"\"', 'class=\"\"grid grid-cols-1 md:grid-cols-2 gap-4\"\"' -replace 'class=\"\"col-md-6\"\"', 'class=\"\"\"\"' | Set-Content 'resources\views\users\create.blade.php'"

echo Conversion completed!
pause