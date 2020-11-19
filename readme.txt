/** 
 * Ideal production release process using Git: 
 * Here we will know; how should be our Git branching strategy or Git branching 
 * model to achieve a successful development & production release process  
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
   There are no any naming conventions, forced by Git; so developers use different
   different naming conventions as per their suitability.
   
   Reference: 
      A. https://dev.to/couchcamote/git-branching-name-convention-cch
      B. https://deepsource.io/blog/git-branch-naming-conventions/
      C. https://gist.github.com/digitaljhelms/4287848

   But, I would like to use following naming conventions for above mentioned branches:
      A. For master branch: Named it as "master"
      B. For develop branch: Named it as "develop"
      C. For feature branches: Named it as "feature/<jira-feature-or-issue-id>-<a-short-description-in-3-4-words-what-type-of-things-going-to-happen-in-this-branch-separated-by-hyphen>"
         Example: feature/EMMS-900 or feature/EMMS-900-compare-url-changes
         If exact jira-id is there, then you can ignore to add short-description in branch-name
	 as jira-issue-id has it's own dedicated page on jira to explain/describe everying in detail 
	 regarding associated feature or bug/issue.
      D. For release branches: Named it as "release/<version-no>"
         Example: release/1.0.0
      E. For hotfix branches: Named it as "hotfix/<jira-raised-issue-id-by-qa>-<a-short-description-in-3-4-words-what-type-of-things-going-to-happen-in-this-branch-separated-by-hyphen>"
         Example: hotfix/EMMS-956 or hotfix/EMMS-956-fetch-correct-base-url-on-production
      F. For bugfix branches: Named it as "bugfix/<jira-raised-issue-id-by-qa>-<a-short-description-in-3-4-words-what-type-of-things-going-to-happen-in-this-branch-separated-by-hyphen>"
         Example: bugfix/EMMS-1300 or bugfix/EMMS-1300-plp-canonical-issue

      Note: While make commit, always mention <jira-issue-id> in commit message like as following:
      	       git commit -m "EMMS-1300: PLP canonical issue resolved"
            If you do this, then whenever you push your code on bitbucket, your all commits related/associated
	    with this issue/bug/feature would be shown at right hand side on jira-issue-id dedicated web-page.

5. When you start development on any Magento2 project, do code & Git branch setup as following:
      A. Install Magento version which you want at Staging/Production/Dev-Machine
      B. Initialize git here by using command "git init" in root folder
      C. Ignore all hidden/visible files/folders from Git (using .gitignore file) except app/code 
         & app/design
      D. Use command like "git remote add origin https://github.com/jitendrakyadav/hello-world.git" 
         to connect to Git remote code system.
      E. If there is already code on Git remote, then use commands:
         a. "git fetch origin"
         b. "git branch -a"	
	    /* -a to display all branches, not only master */
         c. "git checkout mybranch" or "git checkout develop"	
	    /* As develop is the integration branch and most updated one */
         d. "git pull origin mybranch" or "git pull origin develop"
         e. Cut your branch from this "develop" branch and complete your task

6. Branching Strategy: Follow as per in a-successful-git-branching-model-chart.pdf
   A. Git, by default, provides already created "master" branch with infinite lifetime.
   B. Create another branch "develop" from master branch which would be also with infinite 
      lifetime. It's also called as integration branch.
   C. To develop any new feature:
      a. Cut a branch from develop branch like as following when you are present inside develop branch:
            git branch feature/myfeaturebranch
            or
            git checkout -b feature/myfeaturebranch develop	
	    /* Create feature/myfeaturebranch branch and checkout to same as well; 
	       -b is used to do the same forcefully */
      b. After creating feature branch, complete your task and create PR to review 
         and merge the same to develop branch.
      c. Feature branch is also called Topic branch.
      d. Feature branch originates from develop branch and merge back to develop branch
      e. Lifetime: Feature branch exists as long as the feature is in development.
   D. To create a build/release for a no. of features:
      a. Suppose you targeted 4 features in next release and previous release version was 1.0.0 
      b. When all 4 features are developed and merged to develop branch, cut a branch from 
         develop branch like as following when you are present inside develop branch:
            git branch release/1.1.0
            or
            git checkout -b release/1.1.0 develop	
	    /* Create release/1.1.0 branch and checkout to same as well; 
	       -b is used to do the same forcefully */
      c. Give this branch to QA for test. To resolve all bugs against this release, cut all bugfix 
         branches from this release branch, complete code, create PR against this release branch and 
         merge back to the same release branch. This cycle will repeat again and again until all 
         developed features for this release, are bugfree.
      d. After cut release branch from develop branch, all next to next release feature's 
         development and merge back to develop branch, could be continued.
      e. Release branch originates from develop branch and merge back to develop branch as well 
         as to master branch.
      f. After merging the release branch to master branch, tag this version on master branch as 
         following:
            git tag -a 1.1.0 -m "Version 1.1.0 features completed"
	    git checkout 1.1.0
      g. Lifetime: Release branch exists as long as branch merged to develop & master branches.
   E. To fix a bug:
      a. Cut a branch from develop branch like as following when you are present inside develop branch:
            git branch bugfix/mybugfixbranch
            or
            git checkout -b bugfix/mybugfixbranch develop	
	    /* Create bugfix/mybugfixbranch branch and checkout to same as well; 
	       -b is used to do the same forcefully */
      b. After creating bugfix branch, complete your task and create PR to review and merge the 
         same to develop branch.
      d. Bugfix branch originates from develop branch and merge back to develop branch
      e. Lifetime: Bugfix branch exists as long as fixing the bug is in progress.
   F. To do a hotfix: We create this branch when there emerges some urgent/blocker bug/issue 
      on production.
      a. Cut a branch from master branch like as following when you are present inside master branch:
            git branch hotfix/myhotfixbranch
            or
            git checkout -b hotfix/myhotfixbranch master	
	    /* Create hotfix/myhotfixbranch branch and checkout to same as well; 
	       -b is used to do the same forcefully */
      b. After creating hotfix/myhotfixbranch branch, complete your task and create PR to review and 
         merge the same to master branch.
      d. Hotfix branch originates from master branch and merge back to master branch as well as to develop branch.
      e. The one exception to the rule here is that, when a release branch currently exists, the hotfix 
         changes need to be merged into that release branch, instead of develop. 
         Back-merging the hotfix into the release branch will eventually result in the hotfix being merged 
	 into develop too, when the release branch is finished. 
	 If work in develop immediately requires this hotfix and cannot wait for the release branch to be 
	 finished, we may safely merge the hotfix into develop.
      f. Lifetime: Hotfix branch exists as long as fixing the bug is in progress.
