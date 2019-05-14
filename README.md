# IS601 Mini Project 3 - Final
## Part 4 - Adding a Feature

This FAQ project highlights an additional feature which offers an option for users to like/dislike an answer posted to a question. This feature was created using AJAX post request functionality so users may like a post by clicking a link without reloading the page. Liking an answer will update the database with a "1" in the like field. Clicking the same link will undo the like and remove the record from the database. Disliking an answer will either replace the "1" (if answer was already liked) with a "0" or will add a row to the database, reflecting a "0" in the like field if reaction is new and user has no prior reactions to the answer. The logged in user may then review all their reactions (likes/dislikes) in the "Posts I've Reacted to" menu page from the My Account drop-down menu in the top-right corner of the page.


<b>Epic:</b> An authorized user wants to react (like/dislike) an answer posted to a question.

<b>User stories:</b>

<li>As the authorized user, I want to like an answer so that I can view it again later.
<li>As the authorized user, I want to unlike an answer so that it can undo the like and remove any record that indicates I liked the answer.
<li>As the authorized user, I want to dislike an answer so that I can view it again later.
<li>As the authorized user, I want to un-dislike an answer so that it can undo the dislike and remove any record that indicates I disliked the answer.


<b>Heroku:</b> https://is601mp3faqpt4final.herokuapp.com/