/** 
 * Ideal production release process using Git: 
 * Here we will know; how should be our Git branching strategy or Git branching model to achieve a successful development & production release process  
 *
 * Reference: https://nvie.com/posts/a-successful-git-branching-model/
 */

1. Please look/observe pdf file a-successful-git-branching-model-chart.pdf existing in current directory.

2. There are 2 main branches:
   A. master
   B. develop

3. There are 4 supporting branches:
   A. Feature branches
   B. Release branches 
   C. Hotfix branches
   D. Bugfix branches

4. Naming conventions for above mentioned Git branches:
   There are no any naming conventions, forced by Git; so developers use different different naming conventions as per their suitability.
   
   Reference: 
   a. https://dev.to/couchcamote/git-branching-name-convention-cch
   b. https://deepsource.io/blog/git-branch-naming-conventions/
   c. https://gist.github.com/digitaljhelms/4287848

   But, I would like to use following naming conventions for above mentioned branches:
   A. For master branch: Named it as "master"
   B. For develop branch: Named it as "develop"
   C. For feature branches: Named it as "feature/<jira-feature-or-issue-id>-<a-short-description-in-3-4-words-what-type-of-things-going-to-happen-in-this-branch-separated-by-hyphen>"
      Example: feature/EMMS-900 or feature/EMMS-900-compare-url-changes
      If exact jira-id is there, then you can ignore to add short-description in branch-name as jira-issue-id has it's own dedicated page on jira to explain/describe everying in detail regarding associated feature or bug/issue.
   D. For release branches: Named it as "release/<version-no>"
      Example: release/1.0.0
   E. For hotfix branches: Named it as "hotfix/<jira-raised-issue-id-by-qa>-<a-short-description-in-3-4-words-what-type-of-things-going-to-happen-in-this-branch-separated-by-hyphen>"
      Example: hotfix/EMMS-956 or hotfix/EMMS-956-fetch-correct-base-url-on-production
   F. For bugfix branches: Named it as "bugfix/<jira-raised-issue-id-by-qa>-<a-short-description-in-3-4-words-what-type-of-things-going-to-happen-in-this-branch-separated-by-hyphen>"
      Example: bugfix/EMMS-1300 or bugfix/EMMS-1300-plp-canonical-issue

   Note: While make commit, always mention <jira-issue-id> in commit message like as following:
   git commit -m "EMMS-1300: PLP canonical issue resolved"
   If you do this, then whenever you push your code on bitbucket, your all commits related/associated with this issue/bug/feature would be shown at right hand side on jira-issue-id dedicated web-page. 

