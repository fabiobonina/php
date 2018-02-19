# vuejs-php
Vue.js with PHP Api

[Vue.js (v2.2.1)](https://vuejs.org) ve [vue-resource (v1.2.1)](https://github.com/pagekit/vue-resource) kullanarak hazırlamış olduğum basit bir uygulama örneğidir. Php api üzerinden veritabanında kayıtlı olan kullanıcılar alınır ve veritabanına kullanıcı eklenir. Vue.js'i PHP ve MySQL ile birlikte nasıl kullanabilirim diyen geliştirici adaylarına faydalı olması dileğimle.

Ayrıca Vue.js ile ilgili güzel eğitim videoları hazırlayan sevgili [Fatih Acet](https://www.youtube.com/channel/UCvANtNYHe556zUWm6VzJenQ)'in YouTubu kanalına abone olmayı unutmayın. Oldukça faydalı eğitimler var. Göz atmanızı tavsiye ederim.

### Veritabanı Bağlantısı
Veritabanı bağlantısını `api/api.php` dosyasını düzenleyerek yapabilirsiniz.

```
$db = new PDO("mysql:host=localhost;dbname=app;charset=utf8", "root", "");
```

### Veritabanı 

```
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `users` VALUES ('1', 'Gökhan', 'Kaya');
```

### Localhost'da uygulamaya erişmek için
http://localhost/vuejs-php/public
