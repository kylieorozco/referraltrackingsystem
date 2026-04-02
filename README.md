# referraltrackingsystem

Setup Instructions (Local Development with XAMPP & phpMyAdmin)
1. Install XAMPP (https://www.apachefriends.org/index.html) and phpMyAdmin (https://www.phpmyadmin.net/downloads/)
2. In XAMPP Control Panel, press "Start" on Apache & MySQL
3. Open "File Explorer" on computer > open XAMPP folder > open htdocs folder > place project folder "referral_project" in htdocs folder
4. In your browser, go to: http://localhost/phpmyadmin
5. To create the database: click "New" in left sidebar > Enter database name "referrals" > click "Create"
6. To create table: click "referrals" database on left sidebar > press "SQL" on top menu > paste the following:
  CREATE TABLE referrals ( id INT AUTO_INCREMENT PRIMARY KEY, receiving_agent VARCHAR(100), receiving_firm VARCHAR(100), receiving_city VARCHAR(100), receiving_state VARCHAR(50), receiving_zip VARCHAR(20), receiving_phone VARCHAR(20), sending_agent VARCHAR(100), sending_firm VARCHAR(100), sending_city VARCHAR(100), sending_state VARCHAR(50), sending_zip VARCHAR(20), sending_phone VARCHAR(20), buyer_name VARCHAR(100), buyer_address VARCHAR(255), buyer_city VARCHAR(100), buyer_state VARCHAR(50), buyer_zip VARCHAR(20), buyer_business_phone VARCHAR(20), buyer_home_phone VARCHAR(20), buyer_pref_location VARCHAR(100), buyer_home_size VARCHAR(50), buyer_home_type VARCHAR(50), buyer_price_range VARCHAR(50), buyer_num_adults INT, buyer_num_children INT, buyer_children_ages VARCHAR(100), date_contacted DATE, first_appointment DATE, referral_fee_percent DECIMAL(5,2), receiving_sale_signature VARCHAR(5), receiving_sale_signature_date DATE, receiving_broker_signature VARCHAR(5), receiving_broker_signature_date DATE, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP );
7. then press "Go" on the bottom bar
8. To run application: open browser and paste these links; to Submit Form: http://localhost/referral_project/referral_form.html and to View Forms: http://localhost/referral_project/view_referrals.php
