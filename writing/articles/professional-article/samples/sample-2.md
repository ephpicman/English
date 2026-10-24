# Improving data quality before analysis begins

*Illustrative professional article. Technical procedures should follow the organisation’s data policies and system design.*

## Title

**Improving data quality before analysis begins**

## Executive opening

A polished chart cannot repair a dataset whose definitions are inconsistent or whose gaps are misunderstood. Data quality work is often treated as a preliminary cleaning step, but it is part of the analysis itself. The decisions made while correcting, excluding, or grouping records affect the conclusions readers can draw. A transparent process makes those decisions visible and repeatable.

## Context, definitions, and scope

This article focuses on routine operational datasets used for reporting, such as transaction records, service requests, or monthly performance summaries. “Data quality” refers here to whether records are fit for the intended question: complete enough, consistently defined, valid for the period, and traceable to a source. No dataset is perfect, and not every anomaly should be deleted. The goal is to understand the data’s limitations before interpreting a pattern.

## Professional insight 1

Begin by defining the question and the unit of analysis. A report about unique customers is different from one about transactions, even if both use the same table. If one customer can create several records, counting rows as customers will inflate the apparent total. Document what each row represents, which dates define the reporting period, and how duplicates are identified. These decisions should be agreed with the data owner rather than inferred solely from column names.

Next, profile the data before changing it. Check missing values, repeated identifiers, unexpected categories, date ranges, and values outside plausible bounds. A blank field may mean “not collected,” “not applicable,” or “not yet entered”; these meanings should not be collapsed into one category without checking. Keep a record of transformations so that another analyst can understand how the final dataset differs from the source.

## Professional insight 2

Cleaning choices can change the story. Suppose the latest month appears to show a sharp decline in orders. Before interpreting it as a business problem, check whether the month is complete, whether a source feed arrived late, and whether the definition of an order changed. A partial period should be labelled as such or compared with an equivalent period. Removing unusual values may be appropriate when they are confirmed errors, but genuine outliers can be the most important cases to investigate.

The analyst should also distinguish correction from assumption. If an address or category can be verified from a trusted source, a correction may be justified. If the correct value is unknown, it is safer to preserve the uncertainty, document the missingness, and explain how it affects the analysis than to fill the gap with a convenient guess.

## Recommendations and application

Create a repeatable pre-analysis checklist: confirm the question, define the row and reporting period, profile key fields, investigate anomalies, document changes, and review the result with the data owner. Store the original data securely according to policy and keep reproducible scripts or transformation notes where possible. In the final report, explain material limitations in plain language and state whether they could affect the conclusion.

## Risks, limitations, and open questions

Quality checks cannot establish that every source record is true. Some issues require domain knowledge or follow-up with the people who created the data. Privacy rules may also restrict how records can be shared for validation. Teams should balance traceability with appropriate access controls.

Data-quality rules should be agreed with the people who understand the meaning of the fields. An analyst may identify a value that looks unusual but cannot know whether it reflects a legitimate exception. A review queue for unresolved records can preserve that distinction: confirmed errors are corrected through an approved process, while uncertain values remain flagged until a responsible owner can verify them. The team should also keep a record of rule changes, since a new validation rule can make this month’s data look different from earlier periods even when the underlying activity has not changed.

## Conclusion

Reliable analysis begins with clear definitions and transparent decisions about data. A disciplined quality check does not guarantee a correct conclusion, but it makes errors easier to detect and the reasoning easier to trust.
