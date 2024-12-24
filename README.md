# Nursery Manager - WordPress Plugin

תוסף לניהול משתלה עם תמיכה ב-AI ויצירת תוכן אוטומטי.

## תכונות
- יצירת תוכן אוטומטי עם OpenAI
- ממשק נייד להוספה מהירה של מוצרים
- זיהוי צמחים אוטומטי
- אינטגרציה מלאה עם WooCommerce

## דרישות מערכת
- WordPress 5.8 ומעלה
- PHP 7.4 ומעלה
- WooCommerce 5.0 ומעלה
- מפתח API של OpenAI

## התקנה
1. הורד את קובץ ה-ZIP מהרפוזיטורי
2. העלה את התוסף דרך ממשק הניהול של WordPress
3. הפעל את התוסף
4. גש להגדרות והכנס את מפתח ה-API של OpenAI

## שימוש
### הוספת מוצר חדש
1. גש ל"מוצרים" -> "הוסף חדש"
2. השתמש בטופס החדש להוספת מוצר
3. המערכת תיצור אוטומטית תוכן שיווקי

### שימוש בממשק הנייד
1. היכנס מטלפון נייד
2. לחץ על כפתור "הוספה מהירה"
3. צלם את המוצר
4. הוסף פרטים בסיסיים

## פיתוח
### סביבת פיתוח
```bash
# התקנת dependencies
npm install

# הרצת סביבת פיתוח
npm run dev

# בנייה לייצור
npm run build
```

### מבנה הקבצים
```
nursery-manager/
├── nursery-manager.php              # קובץ ראשי
├── includes/                        # קבצי PHP
├── assets/                          # JS & CSS
└── templates/                       # תבניות
```

## תרומה לפרויקט
מוזמנים לתרום לפרויקט! אנא:
1. עשו Fork לפרויקט
2. צרו branch חדש (`git checkout -b feature/amazing-feature`)
3. Commit את השינויים (`git commit -m 'Add amazing feature'`)
4. Push ל-branch (`git push origin feature/amazing-feature`)
5. פתחו Pull Request

## רישיון
GPL v2 או מאוחר יותר

## קרדיטים
- פותח על ידי SSW
- משתמש ב-OpenAI API
- מבוסס על WooCommerce
