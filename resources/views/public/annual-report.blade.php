@extends('layouts.app')

@section('title', 'Annual Performance Report | TMO Ultimate')
@section('meta_description', 'TMO Ultimate annual performance report: revenue, projects, clients, services, acquisition, performance and future outlook.')
@section('body_class', 'tmo-nav-dark tmo-report-page')

@section('content')

<section class="tmo-report-hero">
    <div class="tmo-report-grid"></div>
    <div class="container tmo-report-hero__inner">
        <div class="tmo-report-kicker">
            <span>ANNUAL PERFORMANCE REPORT</span>
            <span>01 / 16</span>
        </div>

        <div class="tmo-report-hero__copy">
            <p class="tmo-report-eyebrow">TMO ULTIMATE · FULL-YEAR REVIEW</p>
            <h1>Built on momentum.<br><em>Measured by results.</em></h1>
            <p class="tmo-report-hero__lead">
                A clear view of the year behind the work — revenue, delivery, clients,
                commercial performance and the systems preparing TMO for what comes next.
            </p>
        </div>

        <div class="tmo-report-hero__numbers">
            <div><strong>${{ number_format($report['headline']['revenue']/1000000, 3) }}M</strong><span>Annual revenue</span></div>
            <div><strong>{{ number_format($report['headline']['projects']) }}</strong><span>Projects completed</span></div>
            <div><strong>{{ number_format($report['headline']['clients']) }}</strong><span>Clients served</span></div>
            <div><strong>+{{ $report['headline']['growth'] }}%</strong><span>Annual growth</span></div>
        </div>
    </div>
</section>

<main class="tmo-report">

<section class="tmo-report-section tmo-report-section--dark">
    <div class="container">
        <div class="tmo-report-section__head">
            <span>02 / EXECUTIVE SUMMARY</span>
            <h2>A year of scale, without losing the standard.</h2>
        </div>
        <div class="tmo-report-summary">
            <p>
                The available performance dataset describes a studio combining meaningful top-line
                expansion with strong delivery quality. Revenue reached <strong>$2.305M</strong> across
                <strong>486 projects</strong> and <strong>214 clients</strong>, with reported annual growth of
                <strong>43.8%</strong>.
            </p>
            <p>
                The operating profile is equally important: a <strong>36.4% net margin</strong>,
                <strong>98.4% project success rate</strong>, <strong>98% customer satisfaction</strong>
                and an average first response time of <strong>42 minutes</strong>.
            </p>
        </div>
    </div>
</section>

<section class="tmo-report-section">
    <div class="container">
        <div class="tmo-report-section__head">
            <span>03 / PERFORMANCE OVERVIEW</span>
            <h2>The headline numbers.</h2>
        </div>
        <div class="tmo-report-kpi-grid">
            @foreach ([
                ['36.4%', 'Net margin'],
                ['32', 'Markets reached'],
                ['4.9 / 5', 'Average rating'],
                ['98%', 'Customer satisfaction'],
                ['98.4%', 'Project success'],
                ['61.3%', 'Customer retention'],
                ['7.8 days', 'Average delivery'],
                ['42 min', 'Average response']
            ] as $kpi)
                <article class="tmo-report-kpi">
                    <strong>{{ $kpi[0] }}</strong>
                    <span>{{ $kpi[1] }}</span>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="tmo-report-section tmo-report-section--cream">
    <div class="container">
        <div class="tmo-report-section__head">
            <span>04 / REVENUE OVERVIEW</span>
            <h2>Revenue accelerated through the year.</h2>
        </div>
        <div class="tmo-quarter-grid">
            @foreach ($report['quarterly'] as $quarter)
                <article class="tmo-quarter">
                    <span>{{ $quarter['label'] }}</span>
                    <strong>${{ number_format($quarter['value']/1000) }}K</strong>
                    <div class="tmo-quarter__bar"><i style="width: {{ ($quarter['value']/762000)*100 }}%"></i></div>
                    <small>{{ number_format(($quarter['value']/$report['headline']['revenue'])*100, 1) }}% of annual revenue</small>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="tmo-report-section">
    <div class="container">
        <div class="tmo-report-section__head">
            <span>05 / SERVICE STATISTICS</span>
            <h2>Ten capabilities. One delivery engine.</h2>
        </div>
        <div class="tmo-report-table-wrap">
            <table class="tmo-report-table">
                <thead><tr><th>Service</th><th>Projects</th><th>Revenue</th><th>Share</th><th>Avg. value</th><th>Success</th><th>Growth</th><th>Rating</th></tr></thead>
                <tbody>
                @foreach ($report['services'] as $service)
                    <tr>
                        <td><strong>{{ $service['name'] }}</strong></td>
                        <td>{{ number_format($service['projects']) }}</td>
                        <td>${{ number_format($service['revenue']) }}</td>
                        <td>{{ $service['share'] }}%</td>
                        <td>${{ number_format($service['avg']) }}</td>
                        <td>{{ $service['success'] }}%</td>
                        <td class="is-positive">+{{ $service['growth'] }}%</td>
                        <td>{{ number_format($service['rating'],1) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<section class="tmo-report-section tmo-report-section--dark">
    <div class="container">
        <div class="tmo-report-section__head">
            <span>06 / EARNINGS</span>
            <h2>Four quarters. $2.305M in revenue.</h2>
        </div>
        <div class="tmo-earnings">
            @foreach ($report['quarterly'] as $quarter)
                <div class="tmo-earnings__item">
                    <span>{{ $quarter['label'] }}</span>
                    <strong>${{ number_format($quarter['value']/1000) }}K</strong>
                    <div><i style="height: {{ ($quarter['value']/762000)*100 }}%"></i></div>
                </div>
            @endforeach
        </div>
        <p class="tmo-report-note">The workbook provides complete quarterly totals. Individual monthly cells are not treated as zero activity where the source does not establish that conclusion.</p>
    </div>
</section>

<section class="tmo-report-section">
    <div class="container">
        <div class="tmo-report-section__head">
            <span>07 / BUSINESS HIGHLIGHTS</span>
            <h2>The moments that defined the year.</h2>
        </div>
        <div class="tmo-highlight-grid">
            <article><span>01</span><strong>$2.305M</strong><p>Highest annual revenue across 486 projects.</p></article>
            <article><span>02</span><strong>$214K</strong><p>Largest project / contract.</p></article>
            <article><span>03</span><strong>132</strong><p>Animation productions delivered.</p></article>
            <article><span>04</span><strong>32</strong><p>Markets reached, including 9 new markets.</p></article>
            <article><span>05</span><strong>61.3%</strong><p>Revenue from returning clients.</p></article>
            <article><span>06</span><strong>42 min</strong><p>Average first response time.</p></article>
        </div>
    </div>
</section>

<section class="tmo-report-section tmo-report-section--cream">
    <div class="container">
        <div class="tmo-report-section__head">
            <span>08 / ACQUISITION CHANNELS</span>
            <h2>Not all growth costs the same.</h2>
        </div>
        <div class="tmo-report-table-wrap">
            <table class="tmo-report-table">
                <thead><tr><th>Channel</th><th>Revenue</th><th>Share</th><th>Clients</th><th>CPA</th><th>AOV</th><th>ROI</th></tr></thead>
                <tbody>
                @foreach ($report['channels'] as $channel)
                    <tr>
                        <td><strong>{{ $channel['name'] }}</strong></td>
                        <td>${{ number_format($channel['revenue']) }}</td>
                        <td>{{ $channel['share'] }}%</td>
                        <td>{{ $channel['clients'] }}</td>
                        <td>${{ number_format($channel['cpa']) }}</td>
                        <td>${{ number_format($channel['aov']) }}</td>
                        <td class="is-positive">{{ number_format($channel['roi'],1) }}×</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<section class="tmo-report-section">
    <div class="container tmo-report-split">
        <div>
            <span class="tmo-report-eyebrow">09 / FINANCIAL STATEMENTS</span>
            <h2>Profitability with room to reinvest.</h2>
            <p>
                The reference income statement records $1.6135M gross profit,
                $1.0615M operating profit and $838,585 net profit.
            </p>
        </div>
        <div class="tmo-financial-list">
            @foreach ($report['financials'] as $item)
                <div class="{{ $item['name'] === 'Net Profit' ? 'is-emphasis' : '' }}">
                    <span>{{ $item['name'] }}</span>
                    <strong>${{ number_format(abs($item['value'])) }}</strong>
                    <small>{{ $item['share'] }}%</small>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="tmo-report-section tmo-report-section--dark">
    <div class="container">
        <div class="tmo-report-section__head">
            <span>10 / UNIT ECONOMICS</span>
            <h2>Value created per project and client.</h2>
        </div>
        <div class="tmo-unit-grid">
            @foreach ([
                ['$4,743','Avg. project value'],
                ['$10,771','Revenue / client'],
                ['$128,056','Revenue / employee'],
                ['$3,320','Gross profit / project'],
                ['$3,918','Net profit / client'],
                ['$118','Blended acquisition cost']
            ] as $unit)
                <article><strong>{{ $unit[0] }}</strong><span>{{ $unit[1] }}</span></article>
            @endforeach
        </div>
    </div>
</section>

<section class="tmo-report-section">
    <div class="container">
        <div class="tmo-report-section__head">
            <span>11 / PLATFORM STACK</span>
            <h2>An integrated delivery system.</h2>
        </div>
        <div class="tmo-stack">
            @foreach ([
                ['01','Creative production','Animation, 3D, character and rigging'],
                ['02','Interactive / games','Game development and interactive media'],
                ['03','Publishing','Publishing workflows and product / IP distribution'],
                ['04','Marketing','Campaign, acquisition and growth support'],
                ['05','Streaming','Streaming and live-content capabilities']
            ] as $stack)
                <article><span>{{ $stack[0] }}</span><div><h3>{{ $stack[1] }}</h3><p>{{ $stack[2] }}</p></div></article>
            @endforeach
        </div>
    </div>
</section>

<section class="tmo-report-section tmo-report-section--cream">
    <div class="container">
        <div class="tmo-report-section__head">
            <span>12 / REGIONAL REVENUE</span>
            <h2>Demand is already international.</h2>
        </div>
        <div class="tmo-region-grid">
            @foreach ($report['regions'] as $region)
                <article>
                    <div><strong>{{ $region['name'] }}</strong><span>{{ $region['share'] }}%</span></div>
                    <div class="tmo-region-bar"><i style="width: {{ ($region['share']/39)*100 }}%"></i></div>
                    <small>{{ $region['clients'] }} clients · ${{ number_format($region['revenue']) }}</small>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="tmo-report-section">
    <div class="container">
        <div class="tmo-report-section__head">
            <span>13 / CLIENT INDUSTRIES</span>
            <h2>Built for businesses where creativity meets technology.</h2>
        </div>
        <div class="tmo-industry-grid">
            @foreach ([
                ['Entertainment & media','Creative production and visual content'],
                ['Games & interactive','Game development, interactive media and technical art'],
                ['Publishing & IP','Publishing, original IP and collectible-oriented work'],
                ['Marketing & brands','Campaign content, digital assets and growth support'],
                ['Technology','Digital products and technical creative services']
            ] as $industry)
                <article><span>0{{ $loop->iteration }}</span><h3>{{ $industry[0] }}</h3><p>{{ $industry[1] }}</p></article>
            @endforeach
        </div>
    </div>
</section>

<section class="tmo-report-section tmo-report-section--cream">
    <div class="container">
        <div class="tmo-report-section__head">
            <span>14 / PERFORMANCE METRICS</span>
            <h2>Operational quality is part of the product.</h2>
        </div>
        <div class="tmo-metric-list">
            @foreach ($report['metrics'] as $metric)
                <div><span>{{ $metric['name'] }}</span><strong>{{ $metric['value'] }}</strong></div>
            @endforeach
        </div>
    </div>
</section>

<section class="tmo-report-section">
    <div class="container">
        <div class="tmo-report-section__head">
            <span>15 / KEY TAKEAWAYS</span>
            <h2>What the numbers are really saying.</h2>
        </div>
        <div class="tmo-takeaways">
            @foreach ([
                'Growth is meaningful: revenue reached $2.305M with reported annual growth of 43.8%.',
                'Delivery quality remains high: 98.4% project success and 98% customer satisfaction.',
                'Repeat business is strategically valuable: repeat-client acquisition shows the strongest reference ROI at 14.8×.',
                'Animation remains the largest project category and revenue contributor in the service table.',
                'The business has an established international footprint across 32 markets.',
                'The next phase is framed around capacity, talent, AI-enabled efficiency and original IP.'
            ] as $takeaway)
                <article><span>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span><p>{{ $takeaway }}</p></article>
            @endforeach
        </div>
    </div>
</section>

<section class="tmo-report-section tmo-report-outlook">
    <div class="container">
        <div class="tmo-report-section__head">
            <span>16 / FUTURE OUTLOOK</span>
            <h2>The next chapter is designed to scale.</h2>
        </div>
        <div class="tmo-outlook-grid">
            @foreach ($report['future'] as $item)
                <article><span>{{ $item['name'] }}</span><strong>{{ $item['value'] }}</strong></article>
            @endforeach
        </div>
        <div class="tmo-report-final">
            <p>
                The forward plan targets higher capacity, expanded talent, AI-assisted cycle-time reduction,
                new original IP, a $1.1M revenue pipeline and international partnerships.
            </p>
            <a href="{{ route('booking') }}" class="tmo-report-cta">
                Build what comes next
                <span>→</span>
            </a>
        </div>
    </div>
</section>

</main>
@endsection
