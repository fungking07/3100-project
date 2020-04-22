### database usage
# format:  database name, attributes, description
# Why default NULL: prevent space input/empty input

##footnote: left:
+ forum.php matching_system.php comment_writing.php

1. user, for login usage
+ user_id, max 8 digit, AUTO_INCREMENT(auto +1 from previous if not specify)
+ Username, max 16 char
+ Password, max 16 char
+ verify_code, max 8 char, default NULL
+ email_address, max 320 char from standard

2. user_profile
+ user_id, Foreign key constraints, both restrict from user.user_id
+ username, max 16 char, name of user
+ personal_picture, max 200 char,for uploading picture, default NULL, you can take a look:[How to upload image to MySQL database and display it using php](https://www.youtube.com/watch?v=Ipa9xAs_nTg)
+ educuational_level, default NULL
+ personal_description
+ major, default NULL
+ consultation_status, using tinyint(1) to stipulate boolean, 0->False, default 0

3. forum
+ post_id, max 8 digit, AUTO_INCREMENT(auto +1 from previous if not specify)
+ post_title, max 128 char
+ post_date, current_timestamp() is used
+ author_id
+ author_name
+ category, max char 16
+ like_number, default 0
+ view_number, default 0, Foreign to post_content to post_content

4. post_content
+ post_id, Foreign key constraints, both restrict from post.post_id
+ post_content
+ like_number, default 0

5. comment
+ comment_id
+ comment_date_time, current_timestamp() is used
+ post_id
+ comments_content
+ author_name, refer to comment writer
+ like_number, default 0

6. consultation_comment
+ user_id
+ author_id
+ score, max 1 digit, represnting "star" number
+ comment
+ status_consultee, using tinyint(1) to stipulate boolean, 0->False, default 0
+ status_consulter, using tinyint(1) to stipulate boolean, 0->False, default 0
+ comment_date

7. chatroom
+ chatroom_id, AUTO_INCREMENT, max 8 digit, global unique key
+ user_id
+ opponent_id
+ last_message_time
+ opponent_picture, var 200, Foreign key from user_profile.personal_picture

8. chat, for chat in chatroom
+ chatroom_id, max 8 digit, Foreign key from chatroom
+ message
+ message_date_time, current_timestamp()
+ sender_name, maxchar 8
