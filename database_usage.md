### database usage
# format:  database name, attributes, description

1. user, for login usage
+ user_id, max 8 digit
+ Username, max 16 char
+ Password, max 16 char

2. user_profile
+ user_id, Foreign key constraints, both restrict from user.user_id
+ user_name, max 16 char, name of user
+ email_address, max 320 char from standard
+ personal_picture, max 200 char,for uploading picture, you can take a look:[How to upload image to MySQL database and display it using php](https://www.youtube.com/watch?v=Ipa9xAs_nTg)
+ educuation
+ personal_description
+ major
+ consultation_status, using tinyint(1) to stipulate boolean, 0->False

3. post
+ post_id, max 8 digit
+ post_title, max 128 char
+ post_date, current_timestamp() is used
+ author_id
+ author_name
+ category, max char 16
+ like_number
+ view_number

4. post_content
+ post_id, Foreign key constraints, both restrict from post.post_id
+ post_content

5. comment
+ comment_id
+ comment_date_time, current_timestamp() is used
+ post_id
+ comments_content
+ author_name, refer to comment writer
+ like_number
