# Short

Small PHP application to shorten long URL's, redirect to them with shorter extensions.

Visit [cgds.me/short](http://cgds.me/short) to see it in action.

## Example

[cgds.me/hi](http://cgds.me/hi) goes to [http://www.hellointernet.fm/podcast/56](http://www.hellointernet.fm/podcast/56)

## Requirements

* [git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)
* [nginx](https://www.nginx.com/resources/wiki/start/topics/tutorials/install/)
* [php-fhm](https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-in-ubuntu-16-04)

## Usage

	cd /root/directory/of/nginx
	git clone https://github.com/cagdasoztekin/short.git
	cd short
	emacs -nw shortened.php # Modify the key variable named $key, and the root directory named $dir
	

## Notes

Don't forget to drop a star if you like this and make me happy.

Pull requests are welcome especially if you want to improve the code or the CSS styling.
