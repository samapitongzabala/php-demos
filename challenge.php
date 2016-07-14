
//1
SELECT username
FROM users
WHERE is_admin = 1
ORDER BY username DESC

//2
SELECT name
FROM  comments
WHERE post_id = 2

//3
SELECT posts.title,posts.body,users.username
FROM posts,users
WHERE posts.is_published = 1
AND posts.user_id = users.user_id
ORDER BY posts.date DESC

//4
SELECT posts.title,categories.name
FROM posts,categories
WHERE posts.category_id = categories.category_id
ORDER BY posts.date DESC
LIMIT 3

//5
SELECT COUNT(*) AS posts
FROM users
WHERE user_id = 1

//6
SELECT posts.title,posts.user_id,categories.name
FROM posts,categories,users
WHERE posts.category_id = categories.category_id
AND posts.user_id = users.user_id
AND posts.is_published = 1
ORDER BY posts.date ASC
LIMIT 10