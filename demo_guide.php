<!DOCTYPE html>
<html>
<style>
    body {background-color: #C0C0C0;}
</style>
<header>
    <h1>KYBERNAN</h1>
    <h2>Demo Guide</h2>
</header>

<?php
require_once(__DIR__.'/../login.php');

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

?>

<p>Kybernan- Demo- v. 0.41</p>
<p>Copyright (C) 2024, Kybernan Foundation</p>
<p>Written by Michael Bermingham and Kurt Kremitzki</p>
<p>Introduction</p>
<p>The Kybernan Foundation was established to develop ways of using social media to enhance democracy.  The name comes from the Greek word ‘kybernan’ meaning ‘to steer’, which is the root of modern English words ‘government’ and ‘cybernetics’.  We feel it is a fitting name for an endeavor that seeks to use information technology to make the government more responsive to citizens.
</p>
<p>This version of the application is meant to demonstrate the platform’s two unique functions - the four-stage workflow tool and the Wiki-Praxis tool.  All the standard functions of a typical social media site (news feed, user profiles, messaging, etc.) will be developed after we have more funding.  Here you’ll learn more about how these unique tools should be used.
</p>
<p>(We apologize for the minimal amount of entries- we had to create everything ourselves.  A live version of the platform would have user-created entries numbering in the hundreds or thousands.)
</p>
<p>Workflow-</p>
<p>The four-stage workflow is meant to break up the process of completing a task into four manageable steps. Successful political action requires large numbers of people, so we must create items for each user profile to attach to in order to be involved at each stage.  After selecting their goals, they gather relevant intel and sort through proposals meant to achieve that goal. If enough people and effort are behind one of the proposals, it becomes an active project to be tracked in terms of its stated goals.  Then the process starts all over again.  For user convenience, we have this process mapped out on our logo, as a visual aid.
</p>
<p>Goals-</p>
<p>Most people seem to think that politics is about getting a candidate elected to office- but this is just a means to an end.  Politics is about getting results.  In order to keep people focused on results, the workflow will begin by making the user choose a tangible goal to achieve (for example, reducing the amount of carbon dioxide in the atmosphere).  Most such goals are data points on an external website.  Other, less tangible goals (such as ‘expanding freedom of the press’) are tracked by third-party groups on an up-or-down scale and mapped in the increase-or-decrease format.
</p>
<p>Each goal page will include the current value and a link to the external source.  You will be able to specify a geographic scope for the goal- global, national, local, etc.  The pages will also include links to relevant intel, proposal, and project pages.  The goal page will be your hub for that particular goal- everything you could want should be accessible here.  Users will select which goals are important to them, and this will determine what posts show up in their feed.
</p>
<p>We feel this approach is better than focusing on candidates because, unlike partisan politics, we believe that when public discourse is stripped of divisive rhetoric, most people share the same goals and merely disagree on how to get there.  By centering those common goals, we can refocus the conversation on how best to achieve them.
</p>
<p>Intel-</p>
<p>This is for tagging relevant items pertaining to a goal to index them in the workflow.  An intel item can be a news article, a scientific paper, a government report, etc. It can be helpful, before creating proposals, to take a look at what is happening in the context of a particular goal before blindly trying to change the status of it.  This is why gathering intel is the second step, after choosing a goal.
</p>
<p>Proposals-</p>
<p>This is where you can publish an idea to solve a problem, as long as it’s relevant to some goal already on the system.  It’s a good idea to search existing proposals to make sure nothing similar already exists.  Feel free to post unconventional ideas, but not unserious ones.  Every proposal must explain the steps that will lead from your idea to the desired change in the goal, what resources are required, and who is responsible for carrying it out.  Users can debate the pros and cons of each proposal, and the best ideas will rise to the top.
</p>
<p>If electing a candidate to office is your primary concern, you can find that here too.  But everything is still put in terms of tangible goals.  If the candidate has a track record, that track record will be viewable under ‘projects’ so that their history can be properly evaluated.
</p>
<p>Logged-in users will also be able to ‘follow’ proposals that they support, and the organizers of that proposal will be able to contact them for assistance in bringing the proposal to fruition.
</p>
<p>Projects-</p>
<p>Here is where you will find proposals that have already been implemented.  You can look here to get new ideas, or if you want to find something to join.  Many projects are pre-existing government or non-profit programs, but they will also be proposals that have ‘graduated’ and been implemented in the real world.  A project is continually evaluated in terms of its stated goals to see if it should be continued or abandoned in favor of other proposals.
</p>
<p>Public officials will also have their records viewable as projects, to see how well their policy outcomes have lined up with their stated goals.  In the proper context, this will be helpful to voters in determining whether to vote for them in the future.
</p>
<p>Workflow, closing thoughts-</p>
<p>Elections are only a tiny fraction of the calendar- in between we measure results with data.  Lately it seems that the only ways citizens are encouraged to engage with the political system are by voting and donating money to political candidates, but there are so many things they could be doing outside of the electoral system.  The workflow tool would create a system for users to be engaged on a policy basis throughout the election cycle.
</p>
<p>Wiki-Praxis-</p>
<p>Are you tired of explaining the same things to people, over and over?  Wiki-Praxis has you covered.  Here, the community works together to have easy-to-share references of bullet points for common debate topics.  This can save you a lot of typing, time, and energy that would be better spent elsewhere.  When creating a new topic, there are a few ground rules to consider.  The premise must be simple, typically able to be inverted with the addition of a  ‘no’ or ‘not’.  For example, if our premise is ‘the metric system is good’, the inverse is not ‘the metric system is evil’, but simply ‘the metric system is not good’.  If you want to have the ‘evil/not evil’ debate, you can create a separate page for that- you can even reuse arguments if you want.  As for which side gets to be the default premise, we will default to whichever position is considered mainstream (i.e. ‘murder should not be legal’), while fringe positions (such as ‘murder should be legal’) will tend to be the inverse.  However, some issues will be more closely divided, and for users who would prefer to view the page from the point of view of the inverse premise, one can click ‘invert’ and the entire page will flip.
</p>
<p>The objective is that after enough edits, each side of the table will represent a perfect form of that side of the argument.  Since the framing of the arguments is arbitrary, we can say that this gives the left side of the table a bias of +1 (for) and the right side a bias of -1 (against).  This gives the whole page an overall bias of 0.
</p>
<p>More complex questions (too big to fit into yes/no) have to be broken down into a series of smaller questions, which can then be linked together.  Currently, the only way to link questions together is by citing them in the arguments with hyperlinks, but we’re working on having something better in a future update.
</p>
<p>Each argument, on either side, has a rebuttal field that gives the other side a chance to respond to that argument specifically.  Each side can monitor the edits back-and-forth and refine their anonymous arguments/rebuttals until they are as good as can be.
</p>
<p>The net effect of having these summaries available is that persuading someone of a political argument online becomes a matter of education, not confrontation.  Arguing with a stranger online is not a good venue for getting someone to change their mind.  This way, someone can be presented with a complete, unbiased summary of both sides of the argument, and make up their own mind.  Additionally, since no one has to engage in a back-and-forth argument, it can be said that the process is as close as possible to being automated, streamlining the process and allowing political persuasion to happen at scale.
</p>
<p>Conclusion-</p>
<p>On the finished platform, new users will enter their goals (and principles from Wiki-Praxis) as values, and be matched up with organizations and public figures that share their values, giving them plenty of content to view when they first sign up.  Similar to how a dating site matches you with people near you based on shared interests, the emphasis will be on local groups you could join to get involved in your community.  Existing social media forces you to seek out these groups yourself and check their issue profiles to see if they match your values- we create pages for those values and allow each entity on the platform to be matched accordingly.
</p>
<p>The system was designed to be value-neutral, in order to be a vessel for pure democracy.  But that doesn’t mean that the outcomes will be value-neutral.  We know that the people of this country are generally capable of empathy and support policies that are humane and take care of the vulnerable.  A system of pure democracy would allow for those values to be amplified, rather than be drowned out by the toxicity of our current political system.  In summary, if you believe that people are generally good, the system will produce good outcomes.
</p>