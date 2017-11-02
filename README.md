# flask-content-pages
Content page templates for marketing and blog
- separate CSS and JS from main app although exact same look and feel
- anticipate we will need to expand the CSS to include classes in the existing
content pages from the WP site and HS blog pages to use the standard Flask typography.

- Explanation:
The index.html page contains a top toolbar with a search icon with  id="search" that should be used as a user click event to search results
- The post.html page is the same look and feel as the index page with top tool bar and bottom footer
and is a blog post template.  You can see how it looks in the WP site here https://www.clearclinica.com/the-la-freeway-model-of-study-monitoring/
- the articles table is a simple blog post with only 1 tag.  See articles.sql
- comments will use the generic Flask commenting code
