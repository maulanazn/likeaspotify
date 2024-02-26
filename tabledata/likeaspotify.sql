SELECT song.title AS title, artist.name AS name, album.name AS album_name FROM song JOIN artist ON song.artist_id = artist.id JOIN album ON song.album_id = album.id WHERE song.artist_id = 'Yovie Widianto' AND song.artist_id = 'Raisa';

SELECT song.id AS id, song.title AS title, artist.name AS name FROM album JOIN song ON album.artist_id = song.artist_id JOIN artist ON album.artist_id = artist.id;

SELECT artist.username FROM users JOIN artist ON users.name = artists.username WHERE users.name = 'maulanazn';