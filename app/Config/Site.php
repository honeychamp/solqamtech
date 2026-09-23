<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Site extends BaseConfig
{
    public string $name        = 'SolqamTech';
    public string $tagline     = 'Solutions. Innovation. Growth.';
    public string $email       = 'info@solqamtech.com';
    public string $phone       = '+92 309 7896666';
    public string $whatsapp    = '923097896666';
    public string $address     = 'Office#4, First Floor, Qasim Arcade, Khyber Market, G-13/4, Islamabad';
    public string $hours       = 'Monday – Saturday, 10:00 – 18:00 · Visits by appointment';
    public string $fromEmail   = 'info@solqamtech.com';
    public string $notifyEmail = 'info@solqamtech.com';

    public array $social = [
        'linkedin'  => '#',
        'instagram' => '#',
        'facebook'  => '#',
        'tiktok'    => '#',
    ];

    public array $markets = ['Worldwide'];

    public array $proof = [
        ['value' => 500, 'suffix' => '+', 'label' => 'Projects Completed', 'ring' => 50],
        ['value' => 8, 'suffix' => '+', 'label' => 'Years Of Experience', 'ring' => 8],
        ['value' => 750, 'suffix' => '+', 'label' => 'Happy Customers', 'ring' => 75],
    ];

    public array $brands = [
        ['name' => 'BBQ Bazaar', 'note' => 'Hospitality'],
        ['name' => 'Su Casa', 'note' => 'Furnishings'],
        ['name' => 'Goodwill', 'note' => 'Detailing'],
        ['name' => 'Skin Line', 'note' => 'Aesthetics'],
        ['name' => 'Vogue Esthetics', 'note' => 'Clinic'],
        ['name' => 'Jazeera Foods', 'note' => 'Food'],
        ['name' => 'Master Fit', 'note' => 'Fitness'],
        ['name' => 'Maison Luma', 'note' => 'Lifestyle'],
        ['name' => 'Olive Grove', 'note' => 'Dining'],
        ['name' => 'Aether Clinic', 'note' => 'Wellness'],
        ['name' => 'Forge Athletics', 'note' => 'Training'],
        ['name' => 'Dune Living', 'note' => 'Interiors'],
    ];

    public array $videos = [
        [
            'id'      => 'office',
            'title'   => 'Discovery',
            'caption' => 'Scope, offer, and constraints mapped in the Islamabad office before a page or campaign is built.',
            'file'    => 'office.mp4',
            'tag'     => 'Strategy',
            'in'      => 1.2,
            'dur'     => 7.5,
        ],
        [
            'id'      => 'web',
            'title'   => 'Product',
            'caption' => 'Structure, forms, and tracking reviewed on screen before a site goes live.',
            'file'    => 'web.mp4',
            'tag'     => 'Interface',
            'in'      => 0.8,
            'dur'     => 7.5,
        ],
        [
            'id'      => 'commerce',
            'title'   => 'Marketplace',
            'caption' => 'Product presentation for stores and Amazon listings, with merchandising first.',
            'file'    => 'commerce.mp4',
            'tag'     => 'Catalog',
            'in'      => 1.0,
            'dur'     => 7.5,
        ],
        [
            'id'      => 'campaigns',
            'title'   => 'Campaigns',
            'caption' => 'Paid and organic creative judged against the offer, not empty reach numbers.',
            'file'    => 'campaigns.mp4',
            'tag'     => 'Performance',
            'in'      => 0.4,
            'dur'     => 7.5,
        ],
    ];

    public function whatsappUrl(string $message = ''): string
    {
        $base = 'https://wa.me/' . preg_replace('/\D+/', '', $this->whatsapp);
        return $message === '' ? $base : $base . '?text=' . rawurlencode($message);
    }

    public function telHref(): string
    {
        return 'tel:' . preg_replace('/\s+/', '', $this->phone);
    }

    public function mapsQuery(): string
    {
        return 'Office 4 First Floor Qasim Arcade Khyber Market G-13/4 Islamabad';
    }

    public function mapsEmbed(): string
    {
        $hl = function_exists('current_lang') && current_lang() === 'ar' ? 'ar' : 'en';

        return 'https://maps.google.com/maps?q=' . rawurlencode($this->mapsQuery()) . '&hl=' . $hl . '&z=16&output=embed';
    }

    public function mapsLink(): string
    {
        return 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($this->mapsQuery());
    }

    public array $nav = [
        ['label' => 'Home', 'url' => '/'],
        ['label' => 'About Us', 'url' => '/about'],
        [
            'label'    => 'Services',
            'url'      => '/services',
            'children' => [
                ['label' => 'Digital Marketing', 'url' => '/services/digital-marketing'],
                ['label' => 'SEO Services', 'url' => '/services/seo'],
                ['label' => 'Website & Technology', 'url' => '/services/website-technology'],
                ['label' => 'Branding & Creative', 'url' => '/services/branding-creative'],
                ['label' => 'AI & Automation', 'url' => '/services/ai-automation'],
            ],
        ],
        ['label' => 'Amazon Services', 'url' => '/amazon-services'],
        ['label' => 'Portfolio', 'url' => '/portfolio'],
        ['label' => 'Our Process', 'url' => '/process'],
        ['label' => 'Insights', 'url' => '/insights'],
        ['label' => 'FAQs', 'url' => '/faqs'],
        ['label' => 'Contact Us', 'url' => '/contact'],
    ];

    public array $serviceOptions = [
        'Digital Marketing',
        'SEO Services',
        'Website & Technology',
        'Branding & Creative',
        'AI & Automation',
        'Amazon Account & Store Setup',
        'Amazon Product Listings',
        'Amazon PPC & Advertising',
        'Amazon Brand Growth',
        'Amazon FBA Support',
        'Amazon Analytics & Reporting',
        'Multiple services / not sure yet',
    ];

    public array $budgetOptions = [
        'To be discussed',
        'Under $1,000',
        '$1,000 – $3,000',
        '$3,000 – $7,000',
        '$7,000+',
        'Monthly retainer',
    ];

    public array $amazonMarketplaces = ['Amazon.sa', 'Amazon.ae', 'Amazon.com', 'Amazon.co.uk', 'Amazon.ca', 'Amazon.de', 'Multiple / undecided'];
    public array $amazonStages = [
        'Planning to launch',
        'Account setup in progress',
        'Live with few listings',
        'Live with advertising',
        'Need optimization / scale',
    ];

    public array $amazonSupport = [
        'Account setup',
        'Listings',
        'PPC',
        'Brand growth',
        'FBA guidance',
        'Reporting',
        'Combined support',
    ];

    public array $homeServices = [
        ['title' => 'Digital Marketing', 'text' => 'Social, search, email, and conversion work planned around qualified inquiries you can follow up.', 'url' => 'services/digital-marketing', 'icon' => 'megaphone'],
        ['title' => 'Website Design & Development', 'text' => 'Fast sites with clear structure, forms, and tracking so campaigns have somewhere useful to land.', 'url' => 'services/website-technology', 'icon' => 'monitor'],
        ['title' => 'Branding & Creative', 'text' => 'Identity, visual systems, and campaign creative that stay consistent across web, ads, and marketplace pages.', 'url' => 'services/branding-creative', 'icon' => 'palette'],
        ['title' => 'Paid Advertising', 'text' => 'Search and social campaigns structured around qualified inquiries, landing-page fit, and reporting you can review.', 'url' => 'services/digital-marketing', 'icon' => 'ads'],
        ['title' => 'Search Engine Optimization', 'text' => 'Technical, on-page, local, and e-commerce SEO with audits, content support, and monthly reporting.', 'url' => 'services/seo', 'icon' => 'search'],
        ['title' => 'Content Creation', 'text' => 'Page copy, listing assets, and social creative written around the offer and the audience.', 'url' => 'services/branding-creative', 'icon' => 'pen'],
        ['title' => 'Videography', 'text' => 'Short-form office and product video for websites, ads, and Amazon creative, scoped before production starts.', 'url' => 'services/branding-creative', 'icon' => 'camera'],
        ['title' => 'Amazon Services', 'text' => 'Account guidance, listing optimization, PPC structure, brand growth, FBA support, and reporting, always within Amazon policy.', 'url' => 'amazon-services', 'icon' => 'box'],
    ];

    public array $process = [
        ['num' => '01', 'icon' => 'search', 'title' => 'Discover', 'text' => 'We study your business, audience, offer, competitors, and constraints before recommending a path.', 'need' => 'Goals, current URLs, competitors, and what is already live.', 'out' => 'A shared picture of the brief, gaps, and what we will not guess.'],
        ['num' => '02', 'icon' => 'target', 'title' => 'Strategize', 'text' => 'We define priorities, KPIs, timelines, and a practical roadmap your team can follow.', 'need' => 'Budget range, decision-makers, and which channels are in play.', 'out' => 'A written plan with KPIs, sequence, and named deliverables.'],
        ['num' => '03', 'icon' => 'monitor', 'title' => 'Build', 'text' => 'We design, develop, and prepare campaigns, websites, listings, or creative assets with a clear scope.', 'need' => 'Access, brand files, product information, and review windows.', 'out' => 'Drafts you can review against the scope, not against a moving brief.'],
        ['num' => '04', 'icon' => 'rocket', 'title' => 'Launch', 'text' => 'We publish, QA, and go live with tracking in place so performance can be reviewed from day one.', 'need' => 'Sign-off on the scoped assets and working tracking or pixels where relevant.', 'out' => 'A live page, listing, or campaign with a baseline you can measure.'],
        ['num' => '05', 'icon' => 'spark', 'title' => 'Optimize', 'text' => 'We refine what is working, pause what is not, and adjust based on data rather than assumptions.', 'need' => 'Enough runtime and budget for the channel to produce a readable signal.', 'out' => 'Documented changes and a note of what is still too early to judge.'],
        ['num' => '06', 'icon' => 'file', 'title' => 'Report', 'text' => 'You receive structured updates covering activity, results, limitations, and recommended next steps.', 'need' => 'An agreed reporting format and a review call if you want one.', 'out' => 'A report that separates activity from outcomes and flags platform limits.'],
    ];

    public array $why = [
        ['title' => 'Strategic Approach', 'text' => 'We design work around your goals, audience, and constraints instead of selling a generic package.'],
        ['title' => 'Integrated Services', 'text' => 'Digital marketing, web development, e-commerce, Amazon, branding, and automation can sit in one coordinated plan.'],
        ['title' => 'Technology & Innovation', 'text' => 'We use modern tools and approved AI workflows where they improve quality, speed, or reporting, always with human review.'],
        ['title' => 'Transparent Communication', 'text' => 'Scope, timelines, reporting cadence, and limitations are shared clearly so you always know what is in progress.'],
        ['title' => 'Long-Term Growth', 'text' => 'We focus on lasting foundations: clean websites, useful content, healthy accounts, and ongoing optimization.'],
        ['title' => 'Client-Focused Support', 'text' => 'Work is scoped, documented, and delivered with a named point of contact and a defined review process.'],
    ];

    public array $whoWeServe = [
        ['icon' => 'store', 'title' => 'Product and retail brands', 'text' => 'Catalogs that need a website, listing structure, and campaigns that match how shoppers actually search.'],
        ['icon' => 'heart', 'title' => 'Clinics and local services', 'text' => 'Service pages, inquiry forms, and local SEO planned around qualified requests, without promised rankings.'],
        ['icon' => 'spark', 'title' => 'Hospitality and food brands', 'text' => 'Menus, locations, and campaign creative that stay consistent across web, social, and marketplace pages.'],
        ['icon' => 'box', 'title' => 'Amazon sellers', 'text' => 'Account, listing, PPC, and brand-growth support scoped around Amazon policy and the current account stage.'],
        ['icon' => 'monitor', 'title' => 'Founders building a first professional site', 'text' => 'A scoped website with forms, tracking, and copy that explains the offer, instead of a template with filler text.'],
        ['icon' => 'target', 'title' => 'Teams that already run ads or Seller Central', 'text' => 'A review of what is live, then a written plan for what to keep, pause, or rebuild before more spend.'],
    ];

    public array $howWeStart = [
        ['icon' => 'pen', 'title' => 'Share the brief', 'text' => 'Goal, current assets, market, and constraints. A form, WhatsApp message, or office visit is enough to begin.'],
        ['icon' => 'search', 'title' => 'Review together', 'text' => 'We ask about access, timeline, and what is already live so the first plan is specific, not a generic package.'],
        ['icon' => 'file', 'title' => 'Write the scope', 'text' => 'Deliverables, reporting cadence, and limits are written before production starts. Work does not begin on a verbal yes alone.'],
    ];

    public array $scopeIncludes = [
        'Named deliverables and a clear note of what is out of scope',
        'Access required, such as website, ads, Seller Central, or analytics',
        'Review cycles and who signs off on creative or listings',
        'Reporting format and how often you will receive it',
        'Known platform limits: no guaranteed rank, sales, or Amazon approval',
    ];

    public array $briefItems = [
        'The business goal in one sentence',
        'Current website, ads, or Amazon account stage',
        'Primary market and language',
        'Brand assets you already have (logo, photos, product copy)',
        'Budget range and a realistic timeline',
        'Who will review work and answer access questions',
    ];

    public array $officeNotes = [
        'Office#4, First Floor, Qasim Arcade, Khyber Market, G-13/4, Islamabad',
        'Monday to Saturday, 10:00 to 18:00. Visits by appointment',
        'Call or WhatsApp before you arrive so someone can receive you',
        'Bring current URLs, brand files, and the decision-maker if possible',
        'Services are delivered worldwide from this office',
    ];

    public array $extraFaqs = [
        ['q' => 'How is pricing discussed?', 'a' => 'Pricing is scoped after we understand the deliverables, access, and timeline. You will see a written outline before work starts. Retainers and one-off projects are both possible.'],
        ['q' => 'What do you need during onboarding?', 'a' => 'Usually: business goals, brand assets, website or Seller Central access as relevant, current analytics, and a decision-maker for reviews. We only request the access required for the scoped work.'],
        ['q' => 'Do you work only in Islamabad?', 'a' => 'The office is in G-13/4, Islamabad. Delivery is worldwide. Calls, WhatsApp, and written scopes are the usual working method for remote clients.'],
        ['q' => 'Can we start with one service and add others later?', 'a' => 'Yes. Many briefs start with a website, a listing set, or a single campaign. Other workstreams can be added once the first scope is stable.'],
        ['q' => 'Will you take over our existing ads or Seller Central account?', 'a' => 'If access is granted and the account is eligible, we can review what is live and propose changes. We do not ask for more permission than the scoped work needs.'],
        ['q' => 'How often will we receive updates?', 'a' => 'The cadence is written into the scope. Typical patterns are weekly notes during launch and monthly reporting once work is in a steady cycle.'],
        ['q' => 'Do you write original website copy?', 'a' => 'Yes, when copy is in scope. We write around the offer and audience. We do not paste competitor pages or filler text.'],
        ['q' => 'What if Amazon or an ad platform rejects an asset?', 'a' => 'We follow public policies and revise where the rule is clear. Approvals still sit with the platform. That limit is stated before advertising or listing work starts.'],
        ['q' => 'Do you visit clients outside Islamabad?', 'a' => 'Most remote work is handled by call, WhatsApp, and written scopes. Office visits are at Qasim Arcade, G-13/4. Travel for a shoot or workshop is scoped separately if it is required.'],
        ['q' => 'Which languages can you work in?', 'a' => 'Briefs are usually taken in English. Page copy, listings, and ads can be produced in the language the market needs when that language is named in the scope.'],
        ['q' => 'How do invoices and kickoff line up?', 'a' => 'Payment terms sit in the written scope. Production typically starts after the agreed kickoff payment and after required access is in place.'],
        ['q' => 'Can we pause a retainer?', 'a' => 'Yes, with notice written into the scope. Paused campaigns still depend on platform settings you control. We document what is live before a pause so restart is not a guess.'],
    ];

    public array $amazonFaqs = [
        ['q' => 'Do you guarantee Amazon account approval?', 'a' => 'No. Amazon decides eligibility. SolqamTech can prepare information and guide setup, but approval, restrictions, and reinstatement sit with Amazon.'],
        ['q' => 'Which marketplaces do you support?', 'a' => 'Briefs commonly cover Amazon.sa, Amazon.ae, Amazon.com, and other public marketplaces the catalog is eligible for. Name the marketplace in the first message.'],
        ['q' => 'Should we advertise before the listing is ready?', 'a' => 'Usually no. Weak titles, images, or search terms waste spend. We prefer a listing review before Sponsored Products, Brands, or Display work.'],
        ['q' => 'Will you log in to Seller Central?', 'a' => 'If the scope needs it and you grant access, yes. We request only the permission the work requires and we do not ask for more than that.'],
        ['q' => 'Do you promise ACOS or rank?', 'a' => 'No. Advertising efficiency and rank depend on fees, inventory, reviews, competition, bid strategy, and account health. Reports separate activity from outcomes.'],
        ['q' => 'Can listing work and a website run together?', 'a' => 'Yes. Many catalogs need a brand site and Amazon listings that tell the same product story. Those workstreams are scoped so creative and tracking stay aligned.'],
    ];

    public array $homeFaqs = [
        ['q' => 'What services does SolqamTech offer?', 'a' => 'SolqamTech provides digital marketing, SEO, website and technology services, branding and creative work, AI-assisted automation, and Amazon seller support for clients worldwide. Each engagement is scoped around your goals, market, and current stage.'],
        ['q' => 'Where is the office, and where do you deliver services?', 'a' => 'The office is in Qasim Arcade, G-13/4, Islamabad. We deliver digital marketing, websites, branding, video, and Amazon support to clients worldwide.'],
        ['q' => 'How long does it take to see results?', 'a' => 'Timelines depend on the service. A landing page or listing refresh can be completed in days or weeks. SEO, brand building, and marketplace growth usually take longer and should be measured over 30 to 90 days or more. We do not promise rankings, sales, or approval outcomes.'],
        ['q' => 'Do you offer customized packages?', 'a' => 'Yes. After a consultation we propose a scoped plan based on your industry, audience, platforms, budget range, and internal resources. You receive a written outline of deliverables before work begins.'],
        ['q' => 'How do you measure campaign success?', 'a' => 'We agree KPIs up front, such as qualified inquiries, conversion rate, listing health, advertising efficiency, or organic visibility, then report against those metrics. Results always depend on product quality, competition, budgets, account status, and market conditions.'],
        ['q' => 'Can you support Amazon and a website together?', 'a' => 'Yes. Many clients need a professional website, brand assets, and Amazon listings that tell a consistent story. We can coordinate those workstreams so creative, tracking, and messaging stay aligned.'],
        ['q' => 'How does onboarding work?', 'a' => 'Onboarding typically includes a discovery call, access to the required accounts or assets, a written scope, and a kickoff checklist. We confirm communication channels, review cycles, and reporting format before production starts.'],
        ['q' => 'How long has SolqamTech been doing this work?', 'a' => 'SolqamTech has 8+ years of experience, 500+ completed projects, and 750+ customers. Each new brief still gets a written scope. Past volume does not guarantee rankings, sales, or approval outcomes.'],
    ];

    public array $portfolio = [
        [
            'title'  => 'Storefront built for browsing and checkout',
            'tag'    => 'Web + CRO',
            'label'  => 'Sample',
            'summary'=> 'A product page, trust, and checkout flow designed to make a catalog easier to browse and measure.',
        ],
        [
            'title'  => 'Amazon listing structure',
            'tag'    => 'Amazon',
            'label'  => 'Sample',
            'summary'=> 'Title, bullets, backend terms, and A+ content planning organized around how shoppers search in the category.',
        ],
        [
            'title'  => 'Landing page for paid campaigns',
            'tag'    => 'Paid + Web',
            'label'  => 'Sample',
            'summary'=> 'A campaign landing page with a clear offer, form tracking, and a simple follow-up workflow.',
        ],
        [
            'title'  => 'Brand identity starter kit',
            'tag'    => 'Branding',
            'label'  => 'Sample',
            'summary'=> 'Logo direction, color system, and social templates that keep a young brand consistent across channels.',
        ],
        [
            'title'  => 'Clinic website for consultation requests',
            'tag'    => 'Web + Local',
            'label'  => 'Sample',
            'summary'=> 'Service pages, proof, hours, and a form path designed so a visitor can request a consultation without hunting.',
        ],
        [
            'title'  => 'Restaurant site with menu and location',
            'tag'    => 'Hospitality',
            'label'  => 'Sample',
            'summary'=> 'A compact site structure for menus, outlets, and inquiry, with creative that can reuse on social.',
        ],
        [
            'title'  => 'Amazon PPC structure after listing cleanup',
            'tag'    => 'Amazon + Ads',
            'label'  => 'Sample',
            'summary'=> 'Campaign groups, search-term review, and negatives planned after title, bullets, and images are coherent.',
        ],
        [
            'title'  => 'SEO foundation for a new service site',
            'tag'    => 'SEO',
            'label'  => 'Sample',
            'summary'=> 'Information architecture, on-page templates, and technical checks before any ranking claims are discussed.',
        ],
    ];

    public array $insights = [
        [
            'slug'        => 'website-structure-that-supports-inquiries',
            'title'       => 'Website Structure That Supports Inquiries',
            'excerpt'     => 'A polished homepage is not enough. This guide explains how page structure, proof, and forms work together.',
            'date'        => '2026-09-10',
            'category'    => 'Web Development',
            'read'        => '6 min read',
            'related'     => ['website-technology', 'digital-marketing'],
            'body'        => '<p>Many business websites look finished and still generate few qualified inquiries. The gap is rarely a missing animation. It is usually unclear positioning, weak page hierarchy, or a form that asks for the wrong information.</p><p>Start with the job the website must do. If the goal is consultation requests, every major page should lead a visitor toward a relevant next step: a service explanation, a process overview, proof, and a form or WhatsApp option. Decorative sections that do not support that path can wait.</p><p>Service pages should answer three questions quickly: who the service is for, what is included, and how work begins. Add FAQs for pricing ranges, timelines, and limitations. Search engines and people both benefit from specific headings and original copy.</p><h2>What SolqamTech puts on a service page</h2><p>From the Islamabad office we write pages around a real offer, not around filler. That usually means a kicker, a heading that names the work, a short lede, deliverables, process, timeline range, tools, and FAQs. Contact details stay specific: phone, WhatsApp, email, and the Qasim Arcade address.</p><p>Forms should ask for the brief we actually need: goal, current stage, market, and constraints. A form that only collects a name and a vague message produces a vague reply.</p><h2>How to measure without over-claiming</h2><p>Measure the basics before chasing advanced CRO tactics: form completions, WhatsApp clicks, call clicks, and which pages precede those actions. Then improve the pages that already attract attention. SolqamTech will not treat a redesigned homepage as a guaranteed inquiry increase. The site has to explain the offer and give people a way to write in.</p>',
        ],
        [
            'slug'        => 'amazon-listings-before-advertising-spend',
            'title'       => 'Why Amazon Listings Should Be Reviewed Before Advertising Spend',
            'excerpt'     => 'Paid traffic cannot repair a weak title, thin images, or a listing that does not match shopper language.',
            'date'        => '2026-09-04',
            'category'    => 'Amazon',
            'read'        => '7 min read',
            'related'     => ['amazon'],
            'body'        => '<p>Sponsored ads can increase visibility, but they also spend against whatever conversion rate the listing already has. If shoppers cannot understand the offer, do not trust the images, or cannot find the product with their own search terms, advertising becomes more expensive than it needs to be.</p><p>A listing review usually starts with keyword research, competitor comparison, and a check of title, bullets, description, backend fields, and image sequence. A+ Content can help where the brand is eligible, but it does not replace a clear main image and accurate product information.</p><h2>What to send before we look at ads</h2><p>Name the marketplace, category, and whether the catalog is live. Say whether Brand Registry or A+ is already in place. If Seller Central access is possible, say so. SolqamTech can then tell you whether the first job is listing structure, images, advertising setup, or reporting.</p><p>Only after the listing is coherent should campaign structure be discussed: match types, search-term review, negatives, and budget pacing. Even then, results depend on Amazon policies, fees, inventory, reviews, competition, and account health. No agency can guarantee ACOS, rank, or sales. That limit is written into Amazon scopes from this office.</p>',
        ],
        [
            'slug'        => 'choosing-between-seo-and-paid-campaigns',
            'title'       => 'Choosing Between SEO and Paid Campaigns When the Budget Is Limited',
            'excerpt'     => 'Both channels can support growth. The better first step depends on intent, timeline, and how ready the website is.',
            'date'        => '2026-08-22',
            'category'    => 'Strategy',
            'read'        => '5 min read',
            'related'     => ['seo', 'digital-marketing'],
            'body'        => '<p>SEO and paid advertising solve different timing problems. Paid campaigns can put a message in front of people quickly. SEO can build over time if the website, content, and technical foundations are sound. A limited budget usually means you need an order, not both channels at full strength from day one.</p><p>If you need inquiries this month and already have a clear offer, a tightly scoped landing page and a modest campaign can be a sensible start. If the website is slow, thin, or confusing, paid traffic will still land on a weak page.</p><h2>A practical order SolqamTech uses</h2><p>We ask which job matters first: qualified inquiries this month, a site people can use, marketplace visibility, or identity across channels. That answer decides whether the first scope is a landing page and campaign, technical SEO, listing work, or brand files.</p><p>If the offer is local or research-heavy and you can wait, technical SEO, on-page work, and useful content may be the better foundation. Either way, reporting should stay honest: show what was done, what moved, and what is still unclear. Rankings and advertising efficiency are not sold as guarantees from this office.</p>',
        ],
        [
            'slug'        => 'what-to-put-in-a-digital-brief',
            'title'       => 'What to Put in a Digital Brief Before You Hire an Agency',
            'excerpt'     => 'A short brief saves a week of vague calls. Goal, stage, assets, and constraints are enough to start a real scope.',
            'date'        => '2026-08-08',
            'category'    => 'Process',
            'read'        => '6 min read',
            'related'     => ['digital-marketing', 'website-technology'],
            'body'        => '<p>Agencies waste time when the first conversation has no goal, no current stage, and no decision-maker. You do not need a 20-page RFP. You need a paragraph that a planner can use.</p><p>Write the outcome you want in one sentence: more consultation requests, cleaner Amazon listings, or a website that can actually collect inquiries. Then note what is already live: domain, ads account, Seller Central, brand files. Add the market and language. Add a budget range even if it is wide.</p><h2>What we put on the SolqamTech contact form</h2><p>The public form and the Amazon form ask for the same core: who you are, how to reach you, and what stage the work is in. You can also WhatsApp +92 309 7896666 or visit Office#4, Qasim Arcade, G-13/4, Islamabad by appointment with the same notes in hand.</p><p>Constraints belong in the same note: platform rules you already know, a launch date, or work you will keep in-house. SolqamTech uses that brief to propose a written scope. Without it, the first reply can only be generic. Production does not start on a verbal yes.</p>',
        ],
        [
            'slug'        => 'reporting-that-separates-activity-from-outcomes',
            'title'       => 'Reporting That Separates Activity From Outcomes',
            'excerpt'     => 'Clicks and impressions are activity. A useful report says what changed, what it means, and what is still uncertain.',
            'date'        => '2026-07-28',
            'category'    => 'Reporting',
            'read'        => '5 min read',
            'related'     => ['digital-marketing', 'seo'],
            'body'        => '<p>A screenshot of ads manager is not a report. Neither is a list of posts published. Those are activity logs. They can be useful, but they do not tell a business owner whether the work moved the agreed KPI.</p><p>A clearer format has three layers: what was done in the period, what the numbers did against the baseline, and what cannot be claimed yet because of sample size, seasonality, or platform policy. SolqamTech writes that split into scopes so reporting is not invented later.</p><h2>Cadence we write into scopes</h2><p>Typical patterns are weekly notes during launch and monthly reporting once work is in a steady cycle. The exact cadence is named before production. If a channel cannot support a KPI, we say so at kickoff. Paid social will not replace a missing offer. SEO will not replace a form that nobody can find. Honest reporting starts with an honest scope.</p><p>Operating figures on this website (500+ projects, 8+ years, 750+ customers) describe tenure. They are not a substitute for a baseline on your account.</p>',
        ],
        [
            'slug'        => 'brand-assets-before-marketplace-and-ads',
            'title'       => 'Why Brand Assets Should Be Settled Before Marketplace and Ads Creative',
            'excerpt'     => 'Listings and ads multiply whatever identity you already have. Weak files get expensive when they are reused at scale.',
            'date'        => '2026-07-12',
            'category'    => 'Branding',
            'read'        => '6 min read',
            'related'     => ['branding-creative', 'amazon'],
            'body'        => '<p>Amazon images, social ads, and website headers all pull from the same identity. If the logo is unreadable at small size, or the product photos disagree with the pack shot, every channel inherits the problem.</p><p>A practical order is: name and logo use, color and type, a short product story, then photography that can crop for listing, web, and ads. SolqamTech can produce campaign creative without a full brand system, but the cost of revising files later is higher than settling the basics first.</p><h2>When brand work sits next to Amazon or ads</h2><p>If a catalog is going live on Amazon.sa, Amazon.ae, or Amazon.com, listing images and A+ modules should reuse the same files as the website. If ads will run the same month, sizes should be planned once. That is production planning, not a claim that a new identity will lift sales.</p><p>Consistent files make listings, pages, and ads easier to review and easier to keep inside platform rules. Brand Registry, A+ eligibility, and ad approval still sit with Amazon and the ad platforms.</p>',
        ],
    ];

    public array $services = [];

    public array $amazonGroups = [];

    public function __construct()
    {
        parent::__construct();
        $this->services      = $this->buildServices();
        $this->amazonGroups  = $this->buildAmazonGroups();
    }

    public function service(string $slug): ?array
    {
        return $this->services[$slug] ?? null;
    }

    public function insight(string $slug): ?array
    {
        foreach ($this->insights as $post) {
            if ($post['slug'] === $slug) {
                return $post;
            }
        }

        return null;
    }

    private function buildServices(): array
    {
        return [
            'digital-marketing' => [
                'slug'     => 'digital-marketing',
                'title'    => 'Digital Marketing Services',
                'nav'      => 'Digital Marketing',
                'icon'     => 'megaphone',
                'kicker'   => 'Campaigns with a clear job to do',
                'excerpt'  => 'Social, search, content, email, and conversion work planned around qualified inquiries you can follow up.',
                'audience' => 'Brands that need a coordinated plan for ads, content, and follow-up rather than disconnected channel activity.',
                'intro'    => 'SolqamTech plans and manages digital marketing programs that connect creative, targeting, landing experiences, and reporting. The aim is qualified interest you can follow up, with limitations stated plainly.',
                'problems' => [
                    'Ads and organic posts that do not point to a clear offer',
                    'Leads that arrive without context or a follow-up process',
                    'Reports that show clicks but not useful next actions',
                    'Creative that looks busy but does not explain the product',
                ],
                'benefits' => [
                    'A written campaign plan with audience, offer, and KPI definitions',
                    'Channel selection based on intent and budget, not whatever is trending this week',
                    'Landing and form alignment so traffic has somewhere useful to go',
                    'Regular reporting that separates activity from outcomes',
                ],
                'deliverables' => [
                    'Social media marketing for Facebook and Instagram',
                    'Google Ads / PPC campaign setup and optimization support',
                    'Lead generation campaign structure',
                    'Content marketing planning and calendar support',
                    'Email marketing sequences where the list and tools exist',
                    'Conversion rate review of key pages and forms',
                    'Marketing strategy and campaign planning workshops',
                    'Analytics, reporting, and performance reviews',
                ],
                'process'  => ['Audit channels and offers', 'Define KPIs and budget split', 'Build creative and tracking', 'Launch and monitor', 'Report and iterate'],
                'timeline' => 'Planning can start within the first week of onboarding. Useful directional data often appears within 30 days; stronger conclusions usually need a longer window and adequate budget.',
                'tools'    => ['Meta Ads Manager', 'Google Ads', 'Google Analytics', 'Search Console', 'Email platforms', 'Approved creative tools'],
                'faqs'     => [
                    ['q' => 'Do you guarantee leads or sales?', 'a' => 'No. Advertising performance depends on offer quality, landing pages, budgets, competition, platform policies, and seasonality. We optimize toward agreed KPIs and report honestly.'],
                    ['q' => 'Can you manage only one channel?', 'a' => 'Yes. Many clients start with a single platform and expand once tracking and creative foundations are stable.'],
                    ['q' => 'What do you need before a campaign can launch?', 'a' => 'A clear offer, a landing place that can collect the inquiry, access to the ad account, and a budget range. Creative can be produced in the branding workstream if it is in scope.'],
                    ['q' => 'How often are campaigns reviewed?', 'a' => 'The cadence is written into the scope. Launch periods are usually reviewed more often than a steady monthly retainer.'],
                ],
                'related'  => ['seo', 'website-technology', 'ai-automation'],
            ],
            'seo' => [
                'slug'     => 'seo',
                'title'    => 'SEO Services',
                'nav'      => 'SEO',
                'icon'     => 'search',
                'kicker'   => 'Visibility that is earned and maintained',
                'excerpt'  => 'Technical, on-page, local, and e-commerce SEO with audits, content support, and monthly reporting.',
                'audience' => 'Businesses that want a durable search presence and are willing to improve the website, not only chase rankings.',
                'intro'    => 'SolqamTech approaches SEO as a combination of technical health, relevant content, and measured off-page work. Rankings are never guaranteed because they depend on competition, search-engine systems, and the quality of the site itself.',
                'problems' => [
                    'Pages that cannot be crawled or indexed cleanly',
                    'Content that does not match how people search',
                    'Local listings that conflict with the website',
                    'E-commerce catalogs with thin or duplicated product copy',
                ],
                'benefits' => [
                    'A prioritized audit instead of an endless task list',
                    'Keyword research tied to real service and product pages',
                    'On-page and content recommendations you can implement',
                    'Monthly reporting that tracks movement without over-claiming',
                ],
                'deliverables' => [
                    'Technical SEO reviews',
                    'On-page SEO recommendations and implementation support',
                    'Off-page SEO and link-building within responsible practices',
                    'Local SEO support',
                    'E-commerce SEO for catalogs and category pages',
                    'Keyword research',
                    'SEO audits',
                    'Content optimization',
                    'Monthly SEO reporting',
                ],
                'process'  => ['Technical and content audit', 'Keyword and page mapping', 'Fix foundations', 'Publish and improve content', 'Report and adjust'],
                'timeline' => 'Foundational fixes can begin immediately. Meaningful organic movement is often reviewed over several months, not a few days.',
                'tools'    => ['Search Console', 'Crawling tools', 'Rank tracking', 'Analytics'],
                'faqs'     => [
                    ['q' => 'Do you guarantee first-page rankings?', 'a' => 'No. SolqamTech does not sell guaranteed rankings. We improve the factors we can control and report what we observe.'],
                    ['q' => 'Is SEO useful for a new website?', 'a' => 'Yes, especially for information architecture, titles, internal links, and technical setup. Results still take time.'],
                    ['q' => 'Do you write the content as well as the technical work?', 'a' => 'When copy is in the scope, yes. Thin pages are a common reason technical SEO does not move. Content and technical work should be planned together.'],
                    ['q' => 'Can SEO run next to paid campaigns?', 'a' => 'Yes. Search terms from ads often inform on-page work. Budgets and KPIs are still named separately so reporting stays honest.'],
                ],
                'related'  => ['digital-marketing', 'website-technology'],
            ],
            'website-technology' => [
                'slug'     => 'website-technology',
                'title'    => 'Website & Technology Services',
                'nav'      => 'Web & Technology',
                'icon'     => 'monitor',
                'kicker'   => 'Sites built to convert and to last',
                'excerpt'  => 'Business websites, WordPress, WooCommerce, Shopify, landing pages, UI/UX, speed, security, and integrations.',
                'audience' => 'Companies that need a fast, maintainable website or store, with a proper handover rather than a disposable template.',
                'intro'    => 'SolqamTech designs and develops websites that explain the offer clearly, load efficiently, and can be updated. We work with WordPress, WooCommerce, Shopify, and custom stacks when the project requires it.',
                'problems' => [
                    'Slow pages and unclear mobile layouts',
                    'Forms that do not notify anyone',
                    'Stores that are difficult to update',
                    'No backup, security, or handover documentation',
                ],
                'benefits' => [
                    'A scoped information architecture before visual polish',
                    'Reusable components for future landing pages',
                    'Performance and accessibility considered during build',
                    'Maintenance and backup options after launch',
                ],
                'deliverables' => [
                    'Business website development',
                    'WordPress development',
                    'WooCommerce development',
                    'Shopify store development',
                    'Landing page design',
                    'Website UI/UX design',
                    'Website maintenance and support',
                    'Speed optimization',
                    'Website security and backup setup',
                    'Third-party integrations and automation',
                ],
                'process'  => ['Sitemap and wireframe', 'UI design approval', 'Development', 'Content and QA', 'Launch and handover'],
                'timeline' => 'Landing pages may take days to a few weeks. Full marketing websites typically take several weeks depending on content, integrations, and revision rounds.',
                'tools'    => ['WordPress', 'WooCommerce', 'Shopify', 'CodeIgniter / custom PHP', 'Analytics', 'Tag management'],
                'faqs'     => [
                    ['q' => 'Will we be able to edit the site?', 'a' => 'Yes. The stack is chosen so content editors can update pages, and we provide basic documentation at handover.'],
                    ['q' => 'Do you rebuild on top of an existing site?', 'a' => 'Often. We first assess what is worth keeping versus what is blocking speed, SEO, or conversions.'],
                    ['q' => 'Do you host the website?', 'a' => 'Hosting can be included or the site can be handed to your host. That choice is written into the scope before launch.'],
                    ['q' => 'Will the site collect inquiries?', 'a' => 'If forms are in scope, yes. We set notifications and a spam check. A form that nobody can find is treated as a structure problem, not a design extra.'],
                ],
                'related'  => ['digital-marketing', 'branding-creative', 'ai-automation'],
            ],
            'branding-creative' => [
                'slug'     => 'branding-creative',
                'title'    => 'Branding & Creative Services',
                'nav'      => 'Branding & Creative',
                'icon'     => 'palette',
                'kicker'   => 'Identity that holds up across channels',
                'excerpt'  => 'Brand identity, social creative, product graphics, video ads, copy, guidelines, and packaging presentation.',
                'audience' => 'Founders and marketing teams who need a coherent look and message before they scale spend.',
                'intro'    => 'SolqamTech builds brand systems and campaign creative that can live on a website, social feed, marketplace listing, and paid ad without looking like four different companies.',
                'problems' => [
                    'Inconsistent logos, colors, and tone across platforms',
                    'Product photos that do not explain features',
                    'Ad creative that cannot be reused or resized cleanly',
                    'No written guidelines for future vendors',
                ],
                'benefits' => [
                    'A practical identity kit, not only a single logo file',
                    'Creative that supports a specific campaign job',
                    'Copy and scripts aligned with the visual system',
                    'Guidelines your team can actually follow',
                ],
                'deliverables' => [
                    'Brand identity and logo design',
                    'Social media creative design',
                    'Product banners and promotional graphics',
                    'Video ad creative and editing',
                    'Copywriting and ad scriptwriting',
                    'Brand guidelines',
                    'Packaging and product presentation design',
                ],
                'process'  => ['Brand workshop', 'Direction and concepts', 'Refinement', 'Asset production', 'Guidelines and handover'],
                'timeline' => 'Identity starters can be produced in a few weeks. Larger systems and video sets depend on shoot access, product samples, and revision cycles.',
                'tools'    => ['Figma', 'Adobe Creative Cloud', 'Approved stock and original photography', 'Video editing tools'],
                'faqs'     => [
                    ['q' => 'Do you only design logos?', 'a' => 'No. A logo is one part of a system that should also cover color, type, applications, and usage rules.'],
                    ['q' => 'Can creative be produced for Amazon and social together?', 'a' => 'Yes. We plan formats so marketplace and social assets stay consistent where policy allows.'],
                    ['q' => 'Do we need a photoshoot?', 'a' => 'Not always. Some briefs can start with existing product photos and approved stock. A shoot is scoped when the catalog cannot be presented honestly without it.'],
                    ['q' => 'Who owns the files?', 'a' => 'Handover of agreed source files is written into the scope. Stock and licensed fonts stay under their own licenses.'],
                ],
                'related'  => ['website-technology', 'digital-marketing'],
            ],
            'ai-automation' => [
                'slug'     => 'ai-automation',
                'title'    => 'AI & Automation Services',
                'nav'      => 'AI & Automation',
                'icon'     => 'spark',
                'kicker'   => 'Workflows that save time, with clear limits',
                'excerpt'  => 'AI-assisted content, chat support workflows, marketing automation, lead follow-up, and reporting systems.',
                'audience' => 'Teams that want practical automation and approved AI tools, with human review where quality matters.',
                'intro'    => 'SolqamTech implements AI-assisted and automated workflows for content drafts, lead capture, follow-up, and reporting. We use approved third-party tools and keep a human review step for public-facing work.',
                'problems' => [
                    'Leads sitting unanswered in inboxes',
                    'Manual reporting that arrives too late',
                    'Content drafts with no editorial control',
                    'Disconnected forms, CRM, and chat tools',
                ],
                'benefits' => [
                    'Faster first response, with people still handling strategy and approvals',
                    'Documented workflows your team can supervise',
                    'Reporting that pulls from agreed sources',
                    'Clear limits on what automation is allowed to send',
                ],
                'deliverables' => [
                    'AI-assisted content creation with editorial review',
                    'AI chatbot and customer-support workflows',
                    'Marketing automation',
                    'Lead capture and follow-up automation',
                    'AI-powered reporting and business workflow solutions',
                    'Integration of approved third-party AI tools',
                ],
                'process'  => ['Map the current workflow', 'Select tools', 'Build and test', 'Add human review rules', 'Train and document'],
                'timeline' => 'Simple lead routing can be live in days. Multi-step automations take longer because they need testing against real inquiries.',
                'tools'    => ['Approved LLM tools', 'Email and CRM automations', 'Chat widgets', 'Zapier / native integrations'],
                'faqs'     => [
                    ['q' => 'Will AI replace our marketing team?', 'a' => 'No. We use AI to draft, route, and summarize. Strategy, brand voice, and final approval stay with your team and ours.'],
                    ['q' => 'Is customer data sent to public AI tools?', 'a' => 'We agree tool lists and data-handling rules before go-live. Sensitive data can be excluded from third-party models.'],
                    ['q' => 'Can you connect our website form to WhatsApp or email?', 'a' => 'Yes, when that routing is in scope. The contact forms on this site already notify the SolqamTech inbox. Client workflows are built separately after the path is mapped.'],
                    ['q' => 'Do chatbots go live without review?', 'a' => 'No. Public-facing replies need a human review rule. Automation that sends the wrong answer is worse than a slower manual reply.'],
                ],
                'related'  => ['digital-marketing', 'website-technology'],
            ],
        ];
    }

    private function buildAmazonGroups(): array
    {
        return [
            [
                'id'      => 'account-setup',
                'title'   => 'Amazon Account & Store Setup',
                'excerpt' => 'Guidance for Seller Central setup, professional seller onboarding, marketplace selection, and Brand Store structure.',
                'items'   => [
                    'Amazon Seller Central account setup guidance',
                    'Amazon Professional Seller account onboarding support',
                    'Marketplace and country selection guidance',
                    'Seller profile and business information setup',
                    'Brand Store setup and optimization',
                    'Amazon account structure and operational guidance',
                ],
            ],
            [
                'id'      => 'listings',
                'title'   => 'Amazon Product Listing Services',
                'excerpt' => 'Research-led titles, bullets, descriptions, backend fields, A+ planning, and listing audits.',
                'items'   => [
                    'Keyword research for Amazon listings',
                    'SEO-optimized product titles',
                    'Product bullet points and product descriptions',
                    'Backend search terms and listing fields',
                    'A+ Content / Enhanced Brand Content support',
                    'Product image direction and infographic planning',
                    'Listing audit, optimization, and content improvement',
                    'Competitor and category research',
                ],
            ],
            [
                'id'      => 'ppc',
                'title'   => 'Amazon PPC & Advertising',
                'excerpt' => 'Sponsored Products, Brands, and Display support with search-term control and efficiency reporting.',
                'items'   => [
                    'Sponsored Products campaigns',
                    'Sponsored Brands campaigns',
                    'Sponsored Display campaigns where eligible',
                    'Automatic and manual campaign setup',
                    'Keyword and search-term analysis',
                    'Bid and budget optimization',
                    'Negative keyword management',
                    'Campaign monitoring and performance reporting',
                    'ACOS, ROAS, conversion rate, and profitability analysis',
                ],
            ],
            [
                'id'      => 'brand-growth',
                'title'   => 'Amazon Brand Growth Services',
                'excerpt' => 'Positioning, Brand Registry guidance where eligible, launch planning, and conversion improvements within policy.',
                'items'   => [
                    'Amazon brand positioning strategy',
                    'Brand Registry guidance where eligible',
                    'Brand Store planning and design',
                    'Product launch strategy',
                    'Review and customer experience improvement within Amazon policies',
                    'Cross-selling and product portfolio planning',
                    'Sales and conversion optimization',
                    'Competitor monitoring and market research',
                ],
            ],
            [
                'id'      => 'fba',
                'title'   => 'Amazon FBA & Fulfillment Support',
                'excerpt' => 'Process guidance for FBA, replenishment, shipment prep, fees, and FBA vs FBM comparison.',
                'items'   => [
                    'FBA process guidance',
                    'Inventory planning and replenishment support',
                    'Shipment preparation guidance',
                    'FBA fee and profitability review',
                    'Inventory health monitoring',
                    'Fulfillment model comparison: FBA vs FBM',
                    'Operational workflow documentation',
                ],
            ],
            [
                'id'      => 'analytics',
                'title'   => 'Amazon Analytics & Reporting',
                'excerpt' => 'Monthly sales, listing, search-term, inventory, and advertising reviews with a practical action list.',
                'items'   => [
                    'Monthly sales and advertising reports',
                    'Listing performance analysis',
                    'Keyword and search-term reporting',
                    'Inventory and profitability tracking',
                    'Advertising performance dashboard',
                    'Action plan based on performance data',
                ],
            ],
        ];
    }
}
