SELECT TIMESTAMPDIFF(DAY, min(date), max(date)) AS `uptime`
FROM member_history;
