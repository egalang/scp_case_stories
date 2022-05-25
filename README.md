# scp_case_stories
docker run --name casestoryweb2 -p 8081:80 -v /root/mysql_data_2:/var/lib/mysql -v /root/webserver_casestory:/app mattrayner/lamp:0.8.0-1804-php7