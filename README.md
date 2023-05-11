* Catatan Proyekan kelompok 1

** Aturan
> 1. Tolong untuk proses isi database ubah dll, menggunakan migration, jangan langsung dari database, agar semua anggota memiliki data database yang sama ketika clone
> 2. Tolong segera dikerjakan, jobdesknya, karena ini cukup sulit, jadi perlu percobaan terus menerus agar berhasil
> 3. Dan untuk seeder, tolong jangan diubah, jika memang ingin membuat seeder baru silahkan, agar data tetap sama
> 3. Semangat wes, aturan lain menyusul


** Setup yang perlu dilakukan setelah melakukan clone
> 1. Untuk mendapatkan vendor file run "composer install" on your terminal sir
> 2. Untuk men-setup Anda .env, silakan gandakan .env.example file Anda dan ganti nama file duplikat menjadi .env
> 3. Lihat isi file .env, pastikan nama database, dan password serta lainnya udah sesuai dengan local db kalian
> 4. Selanjutnya tinggal ketikkan
>> a. php artisan key:generate
>> b. php artisan migrate
>> c. php artisan db:seed
>> d. tinggal "php artisan serve" wes


** Ohiya
terpenting pastikan fork kalian up to date, tutorial fork up to date
https://gist.github.com/JeffCost/3843711
