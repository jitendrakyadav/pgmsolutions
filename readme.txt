/*** Case: when a project is live and now maintenance work comes only ***/
1. When you are in your development project-instance suppose dev-instance, always create branch from "master" i.e. default branch for any development-ticket. Suppose newly created branch for development-ticket is branch_1.
2. Do your all development work in branch_1 and after completion push the branch to remote-repository.
3. Let QA pull the branch_1 in their instance suppose qa-instance and test the same.
4. Let client pull the branch branch_1(or provide the client at your own) at their instance suppose uat-instance and make uat the same.
5. Let deployment-team pull the branch on staging instance suppose stg-instance and test the same (if needed).
6. Otherwise directly pull the branch_1 on production(i.e. production instance suppose prod-instance): means use "git pull origin branch_1" and then use "git checkout branch_1" i.e. branch_1 is now your active branch on production means production is now running with files/folders/codes present in branch_1.
7. Take care of the branch on production for a day 1 or 2.
8. If you get any bad-response from clients for this duration, immediately revert-back your prod-instance to previous successfully running position i.e. fire the command "git checkout branch_0" where branch_0 was the just previous branch. 
9. If your prod-instance is still running successfully for this duration, remain the branch branch_1 active on prod-instance and merge this branch branch_1 to master branch.
10. Remember for developer: Always rebase your branch like branch_1 with master and test the same before passing it to QA as It might possible, in duration when you cut branch branch_1 from master and passing it to QA; deployment team has merged some more branches to master. So to avoid any merge-conflicts while merging this branch to master by deployment-team, always rebase your development branch with master. 

/*** Case: when a project is in development phase and not live yet ***/
1. There is "master" branch as default-branch in your remote repository and one more branch "develop", created from master, present there as well initially.
2. when you are in your development project-instance suppose dev-instance, always create branch from "develop" branch for any development-ticket. Suppose newly created branch for development-ticket is branch_1.
3. Do your all development work in branch_1 and after completion push the branch to remote-repository.
4. Create a pull-request to merge into develop branch.
5. Let reviewer review the code of branch_1 on github.com and merge the same to develop branch.
6. If there is any falt in your code, reviewer can revert back to your code with faults/suggestions.
7. Implement suggestions and again create pull request for develop branch.
8. Remember for developer: Always rebase your branch like branch_1 with develop branch and test the same before passing it to reviewer as It might possible, in duration when you cut branch branch_1 from develop and passing it to reviewer; reviewer has merged some more branches to develop. So to avoid any merge-conflicts while merging this branch to develop by reviewer, always rebase your development branch with develop branch.
9. Let QA pull the branch "develop" on their instance suppose qa-instance and test the same.
10. Let client pull the branch develop(or provide the client at your own) at their instance suppose uat-instance and make uat the same.
11. If anything wrong at any stage, repeat the cycle.
12. After development completion(just before to live), let deployment team pull the develop branch at staging instance suppose stg-instance.
13. Let QA and client make thorough/complete testing against each and every ticket/requirement.
14. If branch "develop" is running successfully on stg-instance, let deployment team pull the branch "develop" on production instance suppose prod-instance and make the branch active on live(means pull & checkout to develop branch on prod-instance) i.e. live the application.
15. Wait for a day 1 or 2, if everything is ok, merge the branch "develop" to master.
16. Now for maintenance the application after live, use the first approach as described above.
