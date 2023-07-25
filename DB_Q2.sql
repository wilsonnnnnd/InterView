-- This query retrieves the Username, Phone, Email, and Position for each user.
-- It combines data from the user, userdata, and userfieldname tables.

-- SELECT statement retrieves the Username, Phone, Email, and Position columns.
SELECT
  u.Username,  -- Username column is directly selected from the user table.
  -- Conditional aggregation using CASE and MAX to retrieve the Phone for each user.
  MAX(CASE WHEN ud.FieldID = 1 THEN ud.Data END) AS Phone,
  -- Conditional aggregation using CASE and MAX to retrieve the Email for each user.
  MAX(CASE WHEN ud.FieldID = 2 THEN ud.Data END) AS Email,
  -- Conditional aggregation using CASE and MAX to retrieve the Position for each user.
  MAX(CASE WHEN ud.FieldID = 3 THEN ud.Data END) AS Position
-- FROM clause specifies the user table as 'u' and the userdata table as 'ud'.
FROM
  user u
-- LEFT JOIN links the user and userdata tables based on the UserID.
LEFT JOIN userdata ud ON u.ID = ud.UserID
-- GROUP BY groups the result by UserID and Username, ensuring each user appears once.
GROUP BY u.ID, u.Username
-- LIMIT restricts the result to only three rows.
LIMIT 3;
